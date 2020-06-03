<?php
error_reporting(0);
session_start();

$connect = new mysqli('localhost', 'root', '', 'bloodshed');

if (isset($_SESSION['username'])) {
    $get_player_id = $_SESSION['username'];
}

// json time list file
$file = file_get_contents('../organizer/time_list.json');

$time_array = json_decode($file, true);

// json prize list file
$prize_file = file_get_contents('../organizer/prize_list.json');

$prize_array = json_decode($prize_file, true);


// fetch particular tournament from table which request id it received from the user request
if (isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'];

    global $player_id;
    // fetching current user data for validation check
    $fetch_participate_player = "SELECT * from `tournament_status` WHERE `event_id` = '$event_id'";
    if ($result = $connect->query($fetch_participate_player)) {
        $player_id = mysqli_fetch_assoc($result);
    } else {
        echo $connect->error;
    }
} else {
    header('Location: tournament.php');
}
$game_type = $player_id['type'];
$game_type = trim($game_type);
// echo $game_type;



// fetching event list from register table to make new entry
$user_event_list = "SELECT * FROM `register` WHERE `username` = '$get_player_id'";
if ($fetch = $connect->query($user_event_list)) {
    echo "<script>alert('fetched');</script>";
} else {
    echo $connect->error;
}
$user_data = mysqli_fetch_array($fetch);
$event_list = $user_data['event_list'];

// Check Current Player is already participated or not
if (isset($_SESSION['username'])) {
    echo '<script>console.log("Checking Hit");</script>';
    if ($game_type == 'solo') {
        echo '<script>console.log("solo hit");</script>';
        $check_solo_player = explode(",", $player_id['player_id']);
        $check_solo_player = array_map('trim', $check_solo_player);

        if (in_array(strtolower($get_player_id), $check_solo_player)) {
            echo "<script>
            setTimeout(() => {
                if (window.innerHeight > 400) {
                    document.getElementById('enable_button').disabled = true;
                    document.getElementById('enable_button').inneHtml = 'Participated';
                    document.querySelector('#enable_button').disabled = true;
                }
            }, 2000);
                </script>";
        }
    } elseif ($game_type == 'duo') {
        echo '<script>console.log("Duo hit");</script>';
        // Remove colon from player_list
        $remove_colon = explode(":", $player_id['player_id']);

        // make again array to string and marked comma in the end 
        $new_array = implode(',', $remove_colon);

        // now separte again string to array for single dimenasional array
        $check_duo_player = explode(",", $new_array);

        $check_duo_player = array_map('trim', $check_duo_player);
        // make multidimensional array
        if (in_array(strtolower($get_player_id), $check_duo_player)) {
            echo "<script>
            setTimeout(() => {
                if (window.innerHeight > 400) {
                    document.getElementById('enable_button').innerHTML = 'Participated';
                    document.getElementById('enable_button').disabled = true;
                }
            }, 2000);
                </script>";
        }
    } elseif ($game_type == 'squad') {
        echo '<script>console.log("Checking Hit");</script>';

        // Remove colon from player_list
        $remove_colon = explode(":", $player_id['player_id']);

        // make again array to string and marked comma in the end 
        $new_array = implode(',', $remove_colon);

        // now separte again string to array for single dimenasional array
        $check_squad_player = explode(",", $new_array);

        $check_squad_player = array_map('trim', $check_squad_player);
        if (in_array(strtolower($get_player_id), $check_squad_player)) {
            echo "<script>
            console.log('participated');
            setTimeout(() => {
                    document.getElementById('enable_button').innerHTML = 'Participated';
                    document.getElementById('enable_button').disabled = true;
            }, 2000);
                </script>";
        }
    }
}

// inserting tournament id into tournament table and event id into user table

$player_id_array = array();
// Solo
if (isset($_POST['player_participation'])) {
    if ($game_type == 'solo') {
        // Entering Player ID In BackEnd
        if (!empty($player_id['player_id'])) {
            $player_id_array = explode(',', $player_id['player_id']);
            $player_id_array[] = $get_player_id;
            $string_convert = implode(',', $player_id_array);
            // echo '<pre>';
            //     print_r($player_id_array);
            //     die();
            $insert_data = "UPDATE `tournament_status` SET player_id = '$string_convert' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_data)) {
                echo '<script>alert("inserted into tournament_status");</script>';
            } else {
                echo $connect->error;
            }

            // insert into tournament record table for all the events records
            $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$string_convert' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_tournament_records)) {
                echo '<script>alert("inserted into tournament_records");</script>';
            } else {
                echo $connect->error;
            }

            // insert event id into user list
            $list_of_event = array();
            if (!empty($event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);

                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                array_push($event_id, $list_of_event);
                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }
        } else {
            array_push($player_id_array, $get_player_id);

            $string_convert = implode('', $player_id_array);

            $insert_data = "UPDATE `tournament_status` SET player_id = '$string_convert' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_data)) {
                echo '<script>alert("inserted into database");</script>';
            } else {
                echo $connect->error;
            }

            // insert into tournament record table for all the events records
            $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$string_convert' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_tournament_records)) {
                echo '<script>alert("inserted into tournament_records");</script>';
            } else {
                echo $connect->error;
            }

            // insert event id into user list
            $list_of_event = array();
            if (!empty($event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);

                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;
                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }
        }
    }
}

// Duo

$insert_duo = array();
if (isset($_POST['player_1'])) {
    echo '<script>al  ert("Duo Hit");</script>';
    $second_player = $_POST['player_1'];
    // Checking Duo
    if (!empty($player_id['player_id'])) {
        $insert_duo = explode(",", $player_id['player_id']);
        $duo_name = $get_player_id . ':' . $_POST['player_1'];
        $insert_duo[] = $duo_name;
        $duo_string = implode(',', $insert_duo);
        $insert_data = "UPDATE `tournament_status` SET player_id = '$duo_string' WHERE `event_id` = '$event_id'";
        if ($connect->query($insert_data)) {
            echo '<script>alert("inserted into database");</script>';
        } else {
            echo $connect->error;
        }
        // insert into tournament record table for all the events records
        $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$duo_string' WHERE `event_id` = '$event_id'";
        if ($connect->query($insert_tournament_records)) {
            echo '<script>alert("inserted into tournament_records");</script>';
        } else {
            echo $connect->error;
        }

        // insert event id into user list
        $list_of_event = array();


        // check current login player have any list or not
        if (!empty($event_list)) {
            $list_of_event = explode(',', $event_list);
            $list_of_event[] = $event_id;
            $event_string_list = implode(',', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        } else {
            // array_push($event_id, $list_of_event);
            $list_of_event[] = $event_id;

            $event_string_list = implode('', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$second_player'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        }

        $list_of_event = array();
        // fetching event list from register table to make new entry
        $second_user = "SELECT * FROM `register` WHERE `username` = '$player_2'";
        if ($fetch = $connect->query($second_user)) {
        } else {
            echo $connect->error;
        }
        $user_data = mysqli_fetch_array($fetch);
        $second_event_list = $user_data['event_list'];

        // check second player have any list
        if (!empty($second_event_list)) {
            $list_of_event = explode(',', $event_list);
            $list_of_event[] = $event_id;
            $event_string_list = implode(',', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        } else {
            // array_push($event_id, $list_of_event);
            $list_of_event[] = $event_id;

            $event_string_list = implode('', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$second_player'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        }
    } else {
        $duo_name = $get_player_id . ':' . $_POST['player_1'];
        array_push($insert_duo, $duo_name);

        $duo_string = implode('', $insert_duo);
        // print_r($duo_string);
        // echo gettype($duo_string);
        $insert_data = "UPDATE `tournament_status` SET player_id = '$duo_string' WHERE `event_id` = '$event_id'";
        if ($connect->query($insert_data)) {
            echo '<script>alert("inserted into database");</script>';
        } else {
            echo $connect->error;
        }

        // insert into tournament record table for all the events records
        $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$duo_string' WHERE `event_id` = '$event_id'";
        if ($connect->query($insert_tournament_records)) {
            echo '<script>alert("inserted into tournament_records");</script>';
        } else {
            echo $connect->error;
        }

        // insert event id into user list
        $list_of_event = array();

        // check current login player have any list or not
        if (!empty($event_list)) {
            $list_of_event = explode(',', $event_list);
            $list_of_event[] = $event_id;
            $event_string_list = implode(',', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        } else {
            // array_push($event_id, $list_of_event);
            $list_of_event[] = $event_id;

            $event_string_list = implode('', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        }

        $list_of_event = array();
        // fetching event list from register table to make new entry
        $second_user = "SELECT * FROM `register` WHERE `username` = '$second_player'";
        if ($fetch = $connect->query($second_user)) {
        } else {
            echo $connect->error;
        }
        $user_data = mysqli_fetch_array($fetch);
        $second_event_list = $user_data['event_list'];

        // check second player have any list
        if (!empty($second_event_list)) {
            $list_of_event = explode(',', $event_list);
            $list_of_event[] = $event_id;
            $event_string_list = implode(',', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$second_player'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        } else {
            // array_push($event_id, $list_of_event);
            $list_of_event[] = $event_id;

            $event_string_list = implode('', $list_of_event);
            $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$second_player'";
            if ($connect->query($insert_eventid_intoUser)) {
                echo '<script>alert("inserted into register table");</script>';
            } else {
                echo $connect->error;
            }
        }
    }
}

// Squad
$insert_squad = array();
if (isset($_POST['player_2'])) {
    $player_2 = $_POST['player_2'];
    $player_3 = $_POST['player_3'];
    $player_4 = $_POST['player_4'];
    if ($game_type == 'squad') {
        if (!empty($player_id['player_id'])) {
            $insert_squad = explode(",", $player_id['player_id']);
            $squad_name = $get_player_id . ':' . $player_2 . ':' . $player_3 . ':' . $player_4;
            $insert_squad[] = $squad_name;
            $squad_string = implode(',', $insert_squad);
            $insert_data = "UPDATE `tournament_status` SET player_id = '$squad_string' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_data)) {
                echo '<script>alert("inserted into database");</script>';
            } else {
                echo $connect->error;
            }
            // die();
            // insert into tournament record table for all the events records
            $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$squad_string' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_tournament_records)) {
                echo '<script>alert("inserted into tournament_records");</script>';
            } else {
                echo $connect->error;
            }

            // insert event id into user list
            $list_of_event = array();

            // check current login player have any list or not
            if (!empty($event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $second_user = "SELECT * FROM `register` WHERE `username` = '$player_2'";
            if ($fetch = $connect->query($second_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $second_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($second_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_2'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_2'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $third_user = "SELECT * FROM `register` WHERE `username` = '$player_3'";
            if ($fetch = $connect->query($third_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $third_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($third_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_3'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_3'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $fourth_user = "SELECT * FROM `register` WHERE `username` = '$player_4'";
            if ($fetch = $connect->query($fourth_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $fourth_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($fourth_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_4'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_4'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            // echo '<pre>';
            // print_r($insert_squad);
            // die();
        } else { //this else is active when tournament status tabel havn't any player in it's column
            $squad_name = $get_player_id . ':' . $player_2 . ':' . $player_3 . ':' . $player_4;
            array_push($insert_squad, $squad_name);

            $squad_string = implode('', $insert_squad);
            $insert_data = "UPDATE `tournament_status` SET player_id = '$squad_string' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_data)) {
                echo '<script>alert("inserted into database");</script>';
            } else {
                echo $connect->error;
            }
            // die();

            // insert into tournament record table for all the events records
            $insert_tournament_records = "UPDATE `tournament_records` SET player_list = '$squad_string' WHERE `event_id` = '$event_id'";
            if ($connect->query($insert_tournament_records)) {
                echo '<script>alert("inserted into tournament_records");</script>';
            } else {
                echo $connect->error;
            }
            // insert event id into user list
            $list_of_event = array();

            // check current login player have any list or not
            if (!empty($event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$get_player_id'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $second_user = "SELECT * FROM `register` WHERE `username` = '$player_2'";
            if ($fetch = $connect->query($second_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $second_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($second_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_2'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_2'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $third_user = "SELECT * FROM `register` WHERE `username` = '$player_3'";
            if ($fetch = $connect->query($third_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $third_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($third_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_3'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_3'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }

            $list_of_event = array();

            // fetching event list from register table to make new entry
            $fourth_user = "SELECT * FROM `register` WHERE `username` = '$player_4'";
            if ($fetch = $connect->query($fourth_user)) {
                $user_data = mysqli_fetch_array($fetch);
            } else {
                echo $connect->error;
            }
            $fourth_event_list = $user_data['event_list'];

            // check second player have any list
            if (!empty($fourth_event_list)) {
                $list_of_event = explode(',', $event_list);
                $list_of_event[] = $event_id;
                $event_string_list = implode(',', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_4'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            } else {
                // array_push($event_id, $list_of_event);
                $list_of_event[] = $event_id;

                $event_string_list = implode('', $list_of_event);
                $insert_eventid_intoUser = "UPDATE `register` SET event_list = '$event_string_list' WHERE `username` = '$player_4'";
                if ($connect->query($insert_eventid_intoUser)) {
                    echo '<script>alert("inserted into register table");</script>';
                } else {
                    echo $connect->error;
                }
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../static_css/header.css">
    <link rel="stylesheet" href="../static_css/eventCss.css">
    <link rel="stylesheet" href="../static_css/foot.css">
    <link rel="stylesheet" href="../static_css/hamburger.css">
    <!-- JS, Popper.js, and jQuery -->
    <style>

    </style>
</head>

<body class="bg-dark">

    <!-- Navbar -->
    <?php
    include 'header.php';
    ?>

    <div class="match_info text-white position-relative text-center">
        <div class="match_info_inner">
            <div class="match_header">
                <h1 class="display-4"><?php echo $player_id['tournament_name']; ?></h1>
                <div class="match_stats">
                    <h4 class="display-4" style="font-size: 30px;">
                        <?php
                        $player_id_array = explode(',', $player_id['player_id']);
                        $player_count = count($player_id_array);
                        if ($game_type == 'solo') {
                            echo 'PLAYER JOINED : ' . $player_count . ' / 100';
                        } elseif ($game_type == 'duo') {
                            echo 'TEAM JOINED : ' . $player_count . ' / 50 || PLAYER HAVE ON EACH TEAM: 2';
                        } else {
                            echo 'TEAM JOINED : ' . $player_count . ' / 25 || PLAYER HAVE ON EACH TEAM: 4';
                        }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>


    <div class="event_main_page container-fluid">
        <div class="row bg-dark">
            <div class="col-md-6 mx-auto pro_pic_section">
                <!-- page main profile -->
                <div class="profile_img">
                    <img class="" src="<?php echo '../' . $player_id['logo']; ?>">
                </div>
            </div>

            <!-- second row for heading -->
            <div class="col-md-6 p-4">

                <!-- game heading -->
                <!-- <h1 id="aa" style="margin-left: 350px; color: cornsilk;">PUBG Mobile Ultimate</h1> -->
                <div class="game_heading text-center">
                    <h1 id="aa" style="color: cornsilk;"><?php echo strtoupper($player_id['game'] . ' MOBILE' . ' [' . $game_type) . ']' ?></h1>
                </div>

                <!-- registration status of the game -->

                <div class="register text-center">
                    <!-- margin 430 replace  with txt-center -->
                    <a href="" class="btn bg-danger position-relative">
                        <span class="pr-3" style="border-right: 2px solid white;">
                            <i class="fa-li fa fa-check-square"></i>
                        </span>
                        <span style="color: cornsilk;" class="pl-2">REGISTERATION OPEN</span>
                    </a>
                </div>

                <!-- Platform status -->

                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <span style="color: cornsilk;" class="h6">Platform:</span>
                        <i class="fas fa-mobile-alt" style="color: cornsilk;"></i>
                    </div>
                </div>

                <!-- Date time, prize and team space status -->

                <div class="row" id="aa">
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-calendar-alt"></i>
                        <h5 class="mt-3"><?php echo $player_id['start_date'] . ' ' . $player_id['time']; ?></h5>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-trophy"></i>
                        <h5 class="mt-3"><?php echo $player_id['prize']; ?></h5>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-users" style="margin-top: 23px; margin-bottom: 23px;"></i>
                        <h5 class="mt-3"><?php
                                            $player_id_array = explode(',', $player_id['player_id']);
                                            $player_count = count($player_id_array);
                                            echo $player_count;

                                            ?>/100</h5>
                    </div>
                </div>


                <!-- Registeration status and rules button -->
                <div class="rule-row row">
                    <div class="col-12 col-md-12 col-lg-4 mt-3 mb-3">
                        <form action="" method="POST">
                            <?php
                            if (isset($_SESSION['username'])) {
                                if ($game_type == 'duo' || $game_type == 'squad') {
                            ?>
                                    <!-- <button type="button" style="color: cornsilk;" id="enable_button" name="player_participation" class="btn bg-danger w-100 mx-auto" data-toggle="modal" data-target="<?php echo '#' . $game_type; ?>"> -->
                                    <button type="button" style="color: cornsilk;" id="enable_button" name="" class="btn bg-danger w-100 mx-auto" data-toggle="modal" data-target="<?php echo '#' . $game_type; ?>">
                                        Participate
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" style="color: cornsilk;" id="enable_button" name="player_participation" class="btn bg-danger w-100 mx-auto">
                                        Participate
                                    </button>
                                <?php
                                }
                            } else {
                                ?>
                                <a style="color: cornsilk;" data-toggle="modal" data-target="#login_modal" class="btn bg-danger w-100 mx-auto">SIGN IN TO JOIN</a>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4  mt-3 mb-3">
                        <a href="#!" class="btn text-white w-100 mx-auto" style="background: #000000;">RULES</a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-3 mb-3 mx-auto">
                        <a href="#!" class="btn text-white w-100 mx-auto" style="background: #0a9b12;">Team Joined</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <!-- Schedule Breakup -->
    <div class="schedule-table">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto p-4 bg-dark">
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <!-- <h3 style="color: cornsilk;" id="table-">SCHEDULE</h3> -->
                    <table class="table table-striped table-dark text-center">
                        <caption>
                            Schedule
                        </caption>
                        <thead>
                            <tr>
                                <th>Group</th>
                                <th>Tentative Start Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $search =  array_search($event_id, array_column(json_decode($file), 'event_id'));
                            $ss = $time_array[$search];

                            foreach (array_slice($ss, 1) as $key) {
                            ?>
                                <tr>
                                    <td><?php echo 'Batch'; ?></td>
                                    <td><?php echo $key; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Prize pool table  -->
    <div class="prize-pool-table container-fluid mb-5">
        <div class="row">
            <div class="col-md-12 mx-auto p-4 mt-5 bg-dark">
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <!-- <h3 style="color: cornsilk;">PRIZE POOL BEAKUP</h3> -->
                <table class="table table-striped table-dark text-center">
                    <caption>
                        Prize Pool Breakup
                    </caption>
                    <thead>
                        <tr>
                            <th>Standings</th>
                            <th>Cash Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $search =  array_search($event_id, array_column(json_decode($prize_file), 'event_id'));
                        $ss = $prize_array[$search];

                        foreach (array_slice($ss, 1) as $key) {
                        ?>
                            <tr>
                                <td><?php echo 'Batch'; ?></td>
                                <td><?php echo $key; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--Duo Participation Modal -->
    <!-- Button trigger modal -->


    <!-- Modal for Duo -->
    <div class="modal fade" id="duo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fill up your team or member detail for duo.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="player_teamName">
                        <label for="player_1">Player username</label>
                        <input type="text" class="form-control" id="player_1" name="player_1" required="" placeholder="Enter Player Username">
                        <label id="error_msg"></label>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="duo_save" class="btn btn-primary">Submit Participation</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="squad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fill up your team or member detail for duo.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="player_teamName_squad">
                        <label for="player_2">Player username</label>
                        <input type="text" class="form-control" id="player_2" name="player_2" required="" data-original-title="Please Enter Name" placeholder="Enter Player Username">
                        <div for="" id="textbox-1"></div>
                        <label for="player_3" class="player_3">Player username</label>
                        <input type="text" class="form-control player_3" id="player_3" name="player_3" required="" data-original-title="Please Enter Name" placeholder="Enter Player Username">
                        <div for="" id="textbox-2"></div>
                        <label for="player_4" class="player_4">Player username</label>
                        <input type="text" class="form-control player_4" id="player_4" name="player_4" required="" data-original-title="Please Enter Name" placeholder="Enter Player Username">
                        <div for="" id="textbox-3"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="squad_save" class="btn btn-primary">Submit Participation</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="event_id" value="<?php echo $event_id; ?>">
    <input type="hidden" id="current_event_time" value="<?php echo $player_id['start_date']; ?>">
    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>

    <script>
        console.log('Script Running');

        $(function() {
            let player_2 = false;
            let player_3 = false;
            let player_4 = false;

            duo_player = false;
            $('#player_1').keyup(function() {
                let textbox = $('#player_1').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();
                $.ajax({
                    url: 'http://localhost/bloodshed_core/static/tournament.php',
                    type: 'POST',
                    data: {
                        check_username: textbox,
                        event_id: event_id,
                        time: current_event_time
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty_list') {
                            duo_player = true;
                            $('#player_1').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else if (data == 'notmatched') {
                            duo_player = true;
                            $('#player_1').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else {
                            $('#player_1').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('Player cant participate');
                        }
                    }
                });
            });

            $('#duo_save').on('click', function() {
                if (duo_player == true) {
                    $('#player_teamName').submit();
                }
            });


            $('#player_2').keyup(function() {
                let textbox = $('#player_2').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: 'http://localhost/bloodshed_core/static/tournament.php',
                    type: 'POST',
                    data: {
                        check_username: textbox,
                        event_id: event_id,
                        time: current_event_time
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty_list') {
                            player_2 = true;
                            $('#player_2').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else if (data == 'notmatched') {
                            player_2 = true;
                            $('#player_2').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else {
                            $('#player_2').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('Player cant participate');
                        }
                    }
                });
            });
            $('#player_3').keyup(function() {
                let textbox = $('#player_3').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: 'http://localhost/bloodshed_core/static/tournament.php',
                    type: 'POST',
                    data: {
                        check_username: textbox,
                        event_id: event_id,
                        time: current_event_time
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty_list') {
                            player_3 = true;
                            $('#player_3').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else if (data == 'notmatched') {
                            player_3 = true;
                            $('#player_3').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else {
                            $('#player_3').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('Player cant participate');
                        }
                    }
                });
            });
            $('#player_4').keyup(function() {
                let textbox = $('#player_4').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: 'http://localhost/bloodshed_core/static/tournament.php',
                    type: 'POST',
                    data: {
                        check_username: textbox,
                        event_id: event_id,
                        time: current_event_time
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty_list') {
                            player_4 = true;
                            $('#player_4').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else if (data == 'notmatched') {
                            player_4 = true;
                            $('#player_4').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Player Added');
                        } else {
                            $('#player_4').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('Player cant participate');
                        }
                    }
                });
            });

            $('#squad_save').on('click', function() {
                console.log('submission-hit');
                console.log(player_1 + ' ' + player_2 + ' ' + player_3);
                if (player_2 == true && player_3 == true && player_4 == true) {
                    console.log('inner-submission-hit');
                    $('#player_teamName_squad').submit();
                }
            });
        });
    </script>
    <?php include '../login_modal.php' ?>
    <script src="../login.js"></script>

    <script src="../JavaScript/Home.js"></script>
</body>

</html>