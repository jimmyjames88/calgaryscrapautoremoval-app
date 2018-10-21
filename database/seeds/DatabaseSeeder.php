<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('leads')->insert([
		   'name' => str_random(10),
		   'email' => str_random(10).'@gmail.com',
		   'phone' => str_random(10),
		   'message' => str_random(150)
	   ]);
    }
}
