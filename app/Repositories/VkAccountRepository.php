<?php


namespace App\Repositories;


use App\VkAccount;
use Carbon\Carbon;

class VkAccountRepository
{
    public static function findOrCreateAccount($oauthUser)
    {
        $account = VkAccount::where('uid', $oauthUser->id)->first();

        if ($account) {
            return self::updateAccount($account, $oauthUser);
        }

        $account = new VkAccount();
        $account->uid = $oauthUser->id;
        $account->nickname = $oauthUser->nickname;
        $account->name = $oauthUser->name;
        $account->email = $oauthUser->accessTokenResponseBody['email'] ?? $oauthUser->email;
        $account->avatar = $oauthUser->avatar;
        $account->token = $oauthUser->token;
        $account->expires_in = Carbon::now()->addSeconds($oauthUser->expiresIn);
        $account->save();

        return $account;
    }

    public static function updateAccount($account, $oauthUser)
    {
        $account->uid = $oauthUser->id;
        $account->nickname = $oauthUser->nickname;
        $account->name = $oauthUser->name;
        $account->email = $oauthUser->accessTokenResponseBody['email'] ?? $oauthUser->email;
        $account->avatar = $oauthUser->avatar;
        $account->token = $oauthUser->token;
        $account->expires_in = Carbon::now()->addSeconds($oauthUser->expiresIn);
        $account->save();

        return $account;
    }
}