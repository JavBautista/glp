<?php

use Illuminate\Database\Seeder;
use App\User;
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

        $role_customer  = Role::where('name', 'customer')->first();
        //$role_collector = Role::where('name', 'collector')->first();
        $role_admin     = Role::where('name', 'admin')->first();

        /*
        $user = new User();
        $user->name = 'Collector';
        $user->email = 'collector@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_collector);

        $user = new User();
        $user->name = 'Customer';
        $user->email = 'customer@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_customer);
        */

        $user = new User();
        $user->name = 'Client';
        $user->email = 'client@glp';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_customer);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@glp';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'DEV';
        $user->email = 'dev@glp';
        $user->password = bcrypt('dbadmin');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
