<?php
/**
 * Created by PhpStorm.
 * User: andrei
 * Date: 24.07.19
 * Time: 18:00
 */

namespace App\Services;

class Util
{
    public static function generateReferralLink()
    {
        $str = str_random(8);

        $referalLink = env('APP_URL') . "/referral/$str";

        return $referalLink;
    }
}