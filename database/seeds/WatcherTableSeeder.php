<?php

use Illuminate\Database\Seeder;
use App\Watcher;


class WatcherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Watcher::create([
           'user_id'=> 1,
           'discussion_id' => 4
       ]);
    }
}
