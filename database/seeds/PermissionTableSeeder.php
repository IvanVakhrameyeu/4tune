<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('slug','user')->first();
        $moderatorRole = Role::where('slug', 'moderator')->first();
        $adminRole = Role::where('slug','admin')->first();
        $superAdminRole = Role::where('slug', 'super-admin')->first();

        $chat = new Permission();
        $chat->slug = 'chat';
        $chat->name = 'Chat';
        $chat->save();
        $chat->roles()->attach($userRole);

        $banUsers = new Permission();
        $banUsers->slug = 'ban-users';
        $banUsers->name = 'Ban Users';
        $banUsers->save();
        $banUsers->roles()->attach($moderatorRole);
        $banUsers->roles()->attach($adminRole);

        $super = new Permission();
        $super->slug = 'super';
        $super->name = 'Super';
        $super->save();
        $super->roles()->attach($superAdminRole);
    }
}
