<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
    nombre
            rfc
            telefono
            movil
            calle
            numero_exterior
            numero_interior
            colonia
            cp
            ciudad
            estado
            contenido
            valor_declarado
            observaciones
    */
    public function up()
    {
        /*
        Schema::create('envios', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('envios');
    }
}
