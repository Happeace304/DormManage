<?php

use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $room = \App\Model\Room::get();
       foreach ($room as $item){
           \Illuminate\Support\Facades\DB::table('bills')->insert([
                'roomId' => $item->roomId,
               'month'=> \Illuminate\Support\Carbon::now()->subMonths(2)->format('Y-m-d'),
               'total'=> rand(50000, 200000),
                'state'=> 1,
               'note'=>str_random(10),

           ]);
       }


       }


}
