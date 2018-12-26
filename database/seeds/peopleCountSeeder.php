<?php

use Illuminate\Database\Seeder;
use \App\Model\Room;
use \App\Model\User;
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
            $room->save();
        }
    }
}
