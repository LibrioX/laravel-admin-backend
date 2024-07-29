<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'name' => 'Super Admin',
            'password' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'super admin',
        ]);
    }
}
