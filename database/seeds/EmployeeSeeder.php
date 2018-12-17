<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Carbon;
use \App\Model\Room;
use \App\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $int= mt_rand(1062055681,1262055681);
        $string = date("Y-m-d ",$int);
        for($i=0;$i<=5;$i++)
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Empployee',
            'email' => 'Emp'.$i.'@gmail.com',
            'password' => bcrypt('user123'),
            'phone' => rand(100000000, 999999999),
            'address'=> str_random(10),
            'gender' =>rand(0,1),
            'birthday'=>$string,
            'role'=>1,
            'roomId'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
