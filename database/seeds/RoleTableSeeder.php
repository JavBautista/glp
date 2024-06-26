<?php

use Illuminate\Database\Seeder;
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
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
        
        $role = new Role();
        $role->name = 'customer';
        $role->description = 'Customer';
        $role->save();

        $role = new Role();
        $role->name = 'collector';
        $role->description = 'Collector';
        $role->save();
    }
}
