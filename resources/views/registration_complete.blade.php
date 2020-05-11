<!-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"> -->
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: #132226;
    }

    .box {
        width: 300px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #040C0E;
        text-align: center;
    }

    .box h1 {
        color: #BE9063;
        text-transform: uppercase;
    }

    a {
        color: white;
        font-size: 14px;
        padding: 10px;
    }

    a:hover {
        color: #BE9063;
    }

    .box input[type="text"],
    .box input[type="password"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #525B56;
        padding: 14px 10px;
        width: 200px;
        color: white;
        outline: none;
        border-radius: 10px;
        transition: 0.25s;
    }

    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
        width: 280px;
        border-color: #BE9063;

    }

    .box input[type="submit"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #BE9063;
        padding: 14px 40px;
        color: white;
        outline: none;
        border-radius: 10px;
        transition: 0.30;
        cursor: pointer;
    }

    .box input[type="submit"]:hover {
        background: #BE9063;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">

                <form class="box" action="{{url('register_complete_form')}}" method="POST">
                @csrf()
                    <h1>Sign up</h1>
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="email" placeholder="Email">
                    <select name="user_type" id="" class="form-control">
                        <option value="" selected="selected">Select Type</option>
                        <option value="user">User</option>
                        <option value="organizer">Organizer</option>
                    </select>
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Create Account" placeholder="Sign Up">
                    <a href="#">Already have one?</a>
                </form>
        </div>
    </div>
</div>
