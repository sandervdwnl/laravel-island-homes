<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'first_name' => 'admin',
        //     'last_name' => 'admin',
        //     'email' => 'admin@mail.com',
        //     'email_verified_at' => now(),
        //     'password' => 'password', // password
        //     'remember_token' => Str::random(10),
        //     'is_admin' => '1'
        // ]);
    }
}
