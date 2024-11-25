<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'fikri31@gmail.com'],[
            'name' => 'Admin One',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);
        User::updateOrCreate(
            ['email' => 'aliibrahimfadlisunan@gmail.com'],[
            'name' => 'Admin Two',
            'password' => Hash::make('54321'),
            'role' => 'admin',
        ]);

    }
}