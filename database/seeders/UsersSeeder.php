<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin
            [
                'role' => 'admin',
                'status' => 'active',
                'username' => 'admin',
                'first_name' => null,
                'last_name' => null,
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],

            // Homeowner
            [
                'role' => 'homeowner',
                'status' => 'active',
                'username' => 'homeowner',
                'first_name' => 'Home',
                'last_name' => 'Owner',
                'email' => 'homeowner@example.com',
                'password' => Hash::make('password'),
            ],

            // Domestic Worker
            [
                'role' => 'domesticworker',
                'status' => 'active',
                'username' => 'domesticworker',
                'first_name' => 'Domestic',
                'last_name' => 'Worker',
                'email' => 'domesticworker@example.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
