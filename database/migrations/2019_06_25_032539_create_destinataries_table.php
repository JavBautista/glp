<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinatariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinataries', function (Blueprint $table) {
            $table->bigIncrements('id');
            //datos personales y de contacto
            $table->string('mail')->nullable();            
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('rfc')->nullable();
            $table->string('department')->nullable();
            $table->string('phone')->nullable();
            $table->string('movil')->nullable();
            
            //valores de address
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('number_out')->nullable();
            $table->string('number_int')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('reference')->nullable();
            $table->string('detail')->nullable();
            
            //datos del destinatario
            $table->string('weight')->nullable();
            $table->string('unit_measure')->nullable();

            //datos genericos
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinataries');
    }
}
