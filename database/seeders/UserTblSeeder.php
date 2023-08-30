<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin login data 
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
        ],
        // Vendor login data 
        [
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('222'),
            'role' => 'vendor',

        ],

        // User login data 
        [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('333'),
            'role' => 'user',
        ]


        ]);
    }
}
