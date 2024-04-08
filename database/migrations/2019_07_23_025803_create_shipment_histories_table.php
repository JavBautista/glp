<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shipment_id');
            $table->string('status')->nullable();   
            $table->string('description')->nullable();
            $table->string('creator_name')->nullable();
            $table->timestamps();

            $table->foreign('shipment_id')->references('id')->on('shipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_histories', function (Blueprint $table) {
            $table->dropForeign('shipment_histories_shipment_id_foreign');
        }); 
        Schema::dropIfExists('shipment_histories');
    }
}
