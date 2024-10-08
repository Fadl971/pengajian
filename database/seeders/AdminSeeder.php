<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 
     */
    public function run(){

    DB::table('users')->truncate();

    DB::table('users')->updateOrInsert([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
        'role' => 'Admin',
    ]);
}
}