<?php

use Illuminate\Database\Seeder;
use App\CustomerStatus;

class CustomerStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_status = new CustomerStatus();
        $customer_status->status = 'activo';
        $customer_status->save();
        $customer_status = new CustomerStatus();
        $customer_status->status = 'inactivo';
        $customer_status->save();
    }
}
