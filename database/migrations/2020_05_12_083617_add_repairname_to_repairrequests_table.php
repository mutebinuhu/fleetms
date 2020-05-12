<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepairnameToRepairrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repairrequests', function (Blueprint $table) {
            //
            $table->string('repair_name');
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repairrequests', function (Blueprint $table) {
            //
            $table->string('repair_name');
            $table->integer('cost');
        });
    }
}
