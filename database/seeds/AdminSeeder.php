<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'phone' => '123456789',
            'address'=> str_random(10),
            'gender' =>1,
            'birthday'=>'2000-01-01',
            'role'=>0,
        ]);
    }
}
