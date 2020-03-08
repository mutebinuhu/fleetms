<?php

use Illuminate\Database\Seeder;

class userstableseeders extends Seeder
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
        	'first_name' => 'nuhu',
        	'sur_name' => 'mutebi',
        	'email' => 'mutebinuhu1@gmail.com',
        	'password' => Hash::make('password'),
        	'role' => 'admin',
        	'department' => 'finance',
        	'phone_number' => '0758567701'
        ]);
    }
}
