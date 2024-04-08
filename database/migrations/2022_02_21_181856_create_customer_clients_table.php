<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('mail')->nullable();
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_last_name')->nullable();
            $table->string('rfc')->nullable();
            $table->string('department')->nullable();
            $table->string('phone')->nullable();
            $table->string('movil')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('number_out')->nullable();
            $table->string('number_int')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('reference')->nullable();
            $table->string('detail')->nullable();
            $table->text('observations')->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_clients', function (Blueprint $table) {
            $table->dropForeign('customer_clients_customer_id_foreign');
        });
        Schema::dropIfExists('customer_clients');
    }
}
