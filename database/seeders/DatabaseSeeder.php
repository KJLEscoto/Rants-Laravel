<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'kin',
            'email' => 'kin@gmail.com',
            'password' => Hash::make('123'),
            'bio' => 'kupal ka ata boss?',
            'location' => 'davao city',
            'website' => 'https://kinwebb.netlify.app',
        ]);
    }
}