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
        DB::table('users')->insert([
            ['firstName'=>'Vinh','lastName'=>'Nguyen','email'=>'vinhnd123@gmail.com','password'=>'202cb962ac59075b964b07152d234b70'],
        ]);

        
    }
}
