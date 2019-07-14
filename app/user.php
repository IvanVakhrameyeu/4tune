<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable=['uid','user_name','first_name','last_name','photo','photo_rec','hash',
        'roles','is_active','registration_ip','email','email_verified_at','password',
        'last_ip','user_ips','registration_time','referrals_id','referral_link','remember_token'];
    static public function getUser($user_identity){
        return static::select('id','user_name','photo')->where('uid','=',$user_identity)->get();
    }
    static public function getPhoto($user_name){
        return static::where('user_name', $user_name)->first()->photo;
    }
    static public function getName($user_name){
        return static::where('user_name', $user_name)->first()->user_name;
    }
    static public function getId($user_name){
        return static::where('user_name', $user_name)->first()->id;
    }
}
