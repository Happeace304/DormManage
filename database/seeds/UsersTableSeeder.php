<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Carbon;
use \App\Model\Room;
use \App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   for($i=0;$i<=10;$i++){
        $int= mt_rand(1062055681,1262055681);
        $string = date("Y-m-d ",$int);
        $lastroom=Room::orderBy('roomId', 'desc')->first()->roomId;
        $room =rand(0,$lastroom);
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('user123'),
            'phone' => rand(100000000, 999999999),
            'address'=> str_random(10),
            'gender' =>rand(0,1),
            'birthday'=>$string,
            'role'=>2,
            'roomId'=>$room,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'expire_date' =>Carbon::now()->addMonths(3)->format('Y-m-d'),
        ]);

    }
    }
}
