<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1; ++$i) { 
	    	DB::table('users')->insert([
                'username' => "scdladmin",
                'email' => "scdladmin@gmail.com",
                'firstname' => "John",
                'lastname' => "Dosejo",
                'middlename' => 'Disca',
                'role' => "admin",
                'password' => Hash::make('masterspecialist2018')
	        ]);
    	}
    }
}
