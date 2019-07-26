<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::where('slug', 'super-admin')->first();
        $superAdminPermission = Permission::where('slug', 'super')->first();

        $superAdmin = new User();
        $superAdmin->name = 'Super Admin';
        $superAdmin->email = 'super-admin@4tune.com';
        $superAdmin->password = bcrypt('Pm$D+>_8?Y\{4rz');
        $superAdmin->save();
        $superAdmin->roles()->attach($superAdminRole);
        $superAdmin->permissions()->attach($superAdminPermission);
    }
}
