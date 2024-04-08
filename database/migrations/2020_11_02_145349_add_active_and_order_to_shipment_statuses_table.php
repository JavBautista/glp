<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveAndOrderToShipmentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->integer('order')->default(0);
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('order');
            $table->dropColumn('description');
        });
    }
}
