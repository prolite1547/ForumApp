<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title'=>'Laravel 5.3'];
        $channel2 = ['title'=>'VueJS'];
        $channel3 = ['title'=>'NodeJS'];
    
        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        
    }
}
