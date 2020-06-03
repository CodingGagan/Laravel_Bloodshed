<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration;
use Session;
use Illuminate\Support\Facades\Hash;

class registration_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function registration_validation()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert_data = new registration;

        $insert_data->username = $request['username'];
        $insert_data->email = $request['email'];
        $insert_data->password = $request['password'];
        $insert_data->user_type = $request['type'];
        $number_of_digits = 30;
        $rand_number =  substr(number_format(time() * mt_rand(), 0, '', ''), 0, $number_of_digits);
        $insert_data->provider_user_id =  $rand_number;
        $insert_data->save();

        session()->flash('register', 'You are register successfully');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        $update_data = registration::where('email', $request->email)->update(['username' => $request->username, "password" => Hash::make($request->password), 'user_type' => $request->user_type]);
        session()->flash('register_done', "You're register with us successfully");
        Session()->flush();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
