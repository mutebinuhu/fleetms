<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnInRepairrequestsTable extends Migration
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
            $table->renameColumn('created_by', 'user_id');
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
            $table->renameColumn('created_by', 'user_id');
            
        });
    }
}
