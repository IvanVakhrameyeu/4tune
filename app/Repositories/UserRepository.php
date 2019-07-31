<?php


namespace App\Repositories;

use App\Services\Util;
use App\User;

class UserRepository
{
    public static function findOrCreateUserFromOAuth($oauthUser)
    {
        $vkAccount = VkAccountRepository::findOrCreateAccount($oauthUser);

        if ($user = $vkAccount->user) {
            return $user;
        }

        $user = new User();
        $user->name = $vkAccount->name;
        $user->email = $vkAccount->email;
        $user->avatar = $vkAccount->avatar;
        $user->active = true;
        $user->referral_link = Util::generateReferralLink();
        $user->save();

        $vkAccount->user_id = $user->id;
        $vkAccount->save();

        $user->addRole('user');

        WalletRepository::createWallet($user); // create wallets for user

        return $user;
    }
}
