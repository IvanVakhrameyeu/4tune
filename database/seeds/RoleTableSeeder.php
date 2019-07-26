<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPermission = Permission::where('slug', 'chat')->first();
        $moderatorPermission = Permission::where('slug','ban-users')->first();
        $adminPermission = Permission::where('slug', 'ban-users')->first();
        $superAdminPermission = Permission::where('slug', 'super')->first();


        $userRole = new Role();
        $userRole->slug = 'user';
        $userRole->name = 'User';
        $userRole->save();
        $userRole->permissions()->attach($userPermission);

        $moderatorRole = new Role();
        $moderatorRole->slug = 'moderator';
        $moderatorRole->name = 'Moderator';
        $moderatorRole->save();
        $moderatorRole->permissions()->attach($moderatorPermission);

        $adminRole = new Role();
        $adminRole->slug = 'admin';
        $adminRole->name = 'Administrator';
        $adminRole->save();
        $adminRole->permissions()->attach($adminPermission);

        $superAdminRole = new Role();
        $superAdminRole->slug = 'super-admin';
        $superAdminRole->name = 'Administrator';
        $superAdminRole->save();
        $superAdminRole->permissions()->attach($superAdminPermission);
    }
}
