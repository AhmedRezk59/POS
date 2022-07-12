<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'first_name' => 'أحمد',
            'last_name' => 'رزق',
            'email' => 'a@a.com',
            'password' => '12345678',
        ]);

        $user->attachRole('super');

        \App\Models\User::factory(50)->create()->each(function($user){
            $user->attachRole('admin');
        });
    }
}
