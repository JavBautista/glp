<?php

use Illuminate\Database\Seeder;
use App\CollectorStatus;

class CollectorStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collector_status = new CollectorStatus();
        $collector_status->status = 'activo';
        $collector_status->save();

        $collector_status2 = new CollectorStatus();
        $collector_status2->status = 'inactivo';
        $collector_status2->save();
    }
}
