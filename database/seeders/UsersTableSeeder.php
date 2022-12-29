<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'UserName_1',
            'email' => 'User@mailaddress_1.com',
            'password' => bcrypt('password'),
            'role'     => 'admin'
        ]);
        
        DB::table('users')->insert([
            'name' => 'UserName_2',
            'email' => 'User@mailaddress_2.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);
    }
}
