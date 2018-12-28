<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Carbon;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=0; $i<=10; $i++){
          $str= str_random(20);
          \Illuminate\Support\Facades\DB::table('news')->insert([
              'title'=> $str,
              'content'=> str_random(100),
              'slug'=> str_slug($str),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'userId'=> 12,

          ]);
      }
    }
}
