<?php

use Illuminate\Database\Seeder;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('repairslist')->insert([
        	[
        		'name' => 'engine',
        		'cost' => 100000

        	],
        	[
        		'name' => 'lights',
        		'cost' => 20000

        	],
        	[
        		'name' => 'breaks',
        		'cost' => 50000
        	]
        ]);
    }
}
