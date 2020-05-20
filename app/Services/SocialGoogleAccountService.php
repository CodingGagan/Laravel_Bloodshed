<?php

namespace App\Services;

use App\SocialAuthGooglemodel;
use App\registRATION;
use Session;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAuthGooglemodel::whereprovider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAuthGooglemodel([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
            $user = registration::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = registration::create([
                    'provider_user_id' => $providerUser->getId(),
                    'email' => $providerUser->getEmail(),
                    // 'name' => $providerUser->getName(),
                    // 'password' => md5(rand(1,10000)),
                ]);
                // Session::put('google_email',$providerUser->getEmail());
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
