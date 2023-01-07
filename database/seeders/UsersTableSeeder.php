<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'a',
            'email' => 'a@a',
            'password' => bcrypt('password'),
            'role'     => 'admin',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'UserName_2',
            'email' => 'User@mailaddress_2.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
