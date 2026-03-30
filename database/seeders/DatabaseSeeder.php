<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'surname' => 'System',
                'username' => 'admin',
                'password' => bcrypt('password'),
                'type' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'care@cuk.ac.ke'],
            [
                'name' => 'Care',
                'surname' => 'cuk',
                'username' => 'cuk',
                'password' => bcrypt('care@cuk=2060'),
                'type' => 'admin',
            ]
        );

    }
}
