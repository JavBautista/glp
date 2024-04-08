<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusIdAndUserIdToCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collectors', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('status_id')->references('id')->on('collector_statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collectors', function (Blueprint $table) {
            $table->dropForeign('collectors_status_id_foreign');
            $table->dropForeign('collectors_user_id_foreign');
            $table->dropColumn('status_id');
            $table->dropColumn('user_id');
        });
    }
}
