<?php

use Illuminate\Database\Seeder;
use \App\Model\Room;
use \App\User;
class peopleCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    $rooms= Room::all();
        foreach ($rooms as $room) {

            $room->peopleCount = User::where('roomId', $room->roomId)->count();
            echo $room->peopleCount;
            if ($room->peopleCount == 4) $room->state = 1;
            else $room->state = 0;
            $room->save();
        }
    }
}
