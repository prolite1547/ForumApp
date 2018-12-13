<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=> 'admin',
            'password'=>bcrypt('admin'),
            'email'=>'forumapp@mjd.dev',
            'admin'=> 1,
            'avatar'=>asset('avatars/avatar.jpg')
        ]);

        App\User::create([
            'name'=> 'user101',
            'password'=>bcrypt('user'),
            'email'=>'forumappuser@mjd.dev',
            'avatar'=>asset('avatars/avatar.jpg')
        ]);
    }
}
