<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Zone;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        Zone::create(['name' => 'General', 'hourly_rate' => 100]);
        Zone::create(['name' => 'Premium', 'hourly_rate' => 200]);
        Zone::create(['name' => 'Deluxe', 'hourly_rate' => 300]);
    }
}
