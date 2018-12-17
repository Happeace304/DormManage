<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  for($i=65;$i <=67;$i++) {
        $letter = chr($i);
        for($j=1; $j <=3;$j++) {
            for($k=1;$k<=5; $k++)
            DB::table('rooms')->insert([
                'roomName' => $letter.$j.'0'.$k,

            ]);
        }
    }
    }
}
