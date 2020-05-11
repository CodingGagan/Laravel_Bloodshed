<?php

namespace App\Http\Controllers;

use App\SocialAuthGoogleController;
use Illuminate\Http\Request;
use Socialite;
use Session;

use App\Services\SocialGoogleAccountService;


class SocialAuthGoogleControllerController extends Controller
{
    /**
     * Create a redirect method to google api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback(SocialGoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());
        // echo $user->name;
        // echo '<pre>';
        // print_r($user);
        // die();
        // if ($user->name == '') {
        //     $get_shop_info_query_all = shop_info::distinct('images')->pluck('images', 'specillaty_service');
        //     session()->flash('register_complete', 'Please Complete your details');
        //     Session::put('register_email',$user->email);
        //     Session::put('provider_user_id',$user->provider_user_id);
        //     return redirect('/register_confirm')->with('user_data',$user);
        //     return view('register_complete_page')->with('user_detail', $user)->with('shop_navbar_info', $get_shop_info_query_all);
        // } else {
        //     session()->flash('email_exists_google', 'Your Email is already registered with us. Please verify and Sign In with your email and password.');
        //     Session::flush();
        //     return redirect('/');
        // }

        Session::put('user_email',$user->email);
        return redirect('/register_complete');
    }
}
