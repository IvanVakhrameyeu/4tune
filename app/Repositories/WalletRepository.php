<?php

namespace App\Repositories;

class WalletRepository
{
    public static function createWallet($user)
    {
        if ($user) {
            $user->createWallet([
                'name' => 'real',
                'slug' => 'EUR',
            ]);
            $user->createWallet([
                'name' => 'real',
                'slug' => 'USD',
            ]);
            $user->createWallet([
                'name' => 'real',
                'slug' => 'RUB',
            ]);
        }
    }
}
