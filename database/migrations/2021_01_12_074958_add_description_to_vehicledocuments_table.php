<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToVehicledocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicledocuments', function (Blueprint $table) {
            //
            $table->string('description')->nullable();
            $table->string('attachment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicledocuments', function (Blueprint $table) {
            //
             $table->string('description')->nullable();
             $table->string('attachment');
        });
    }
}
