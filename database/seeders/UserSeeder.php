<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 5件のユーザーデータを挿入
        DB::table('users')->insert([
            [
                'name' => 'User One',
                'email' => 'userone@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password1'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698562456/xnq3a2nynbroey9z2ton.jpg',
                'univ' => 'University A',
                'birthdate' => '2000-01-01',
                'grade' => '学部1年',
            ],
            [
                'name' => 'User Two',
                'email' => 'usertwo@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password2'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698561890/uoe3opm2g8rdmnshrery.jpg',
                'univ' => 'University B',
                'birthdate' => '2000-02-02',
                'grade' => '学部2年',
            ],
            [
                'name' => 'User Three',
                'email' => 'userthree@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password3'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698145229/xqkjrvpfcswmzaxpv0ct.webp',
                'univ' => 'University C',
                'birthdate' => '2000-03-03',
                'grade' => '学部3年',
            ],
            [
                'name' => 'User Four',
                'email' => 'userfour@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password4'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697972684/vrpgqpeedm4alj0ylnz0.jpg',
                'univ' => 'University D',
                'birthdate' => '2000-04-04',
                'grade' => '学部4年',
            ],
            [
                'name' => 'User Five',
                'email' => 'userfive@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password5'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697816981/strebqdqqcd4ofgmhyow.jpg',
                'univ' => 'University E',
                'birthdate' => '2000-05-05',
                'grade' => '修士1年',
            ],
        ]);
    }
}
