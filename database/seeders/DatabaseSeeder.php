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

        User::factory()->create([
            'name' => 'nik',
            'email' => 'nik@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345')
        ]);
        User::factory(10)->create();
    }
}
