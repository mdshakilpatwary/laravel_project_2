<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTblSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserTblSeeder::class]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
