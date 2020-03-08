<?php

use Illuminate\Database\Seeder;

class userstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	[
        	'first_name' => 'jose',
        	'sur_name' => 'mubiru',
        	'email' => 'mubirujose@gmail.com',
        	'password' => Hash::make(12345),
        	'role' => 'driver',
        	'department' => 'procurement',
        	'phone_number' => '0758567702'
        	],
        	[
        	'first_name' => 'isaac',
        	'sur_name' => 'kavuma',
        	'email' => 'kavumaisaac@gmail.com',
        	'password' => Hash::make(12345),
        	'role' => 'to',
        	'department' => 'finance',
        	'phone_number' => '0758567703'
        	],
        	[
        	'first_name' => 'pato',
        	'sur_name' => 'mugisha',
        	'email' => 'mugishapato@gmail.com',
        	'password' => Hash::make(12345),
        	'role' => 'driver',
        	'department' => 'accounts',
        	'phone_number' => '0758567704'
        	],
        	[
        	'first_name' => 'jose',
        	'sur_name' => 'mabirizi',
        	'email' => 'mabirizijose@gmail.com',
        	'password' => Hash::make(12345),
        	'role' => 'driver',
        	'department' => 'accounts',
        	'phone_number' => '0758567705'
        	],
        ]);
    }
}
