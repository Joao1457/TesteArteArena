<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
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
        // User::factory(10)->create();

        User::factory(1)->create([
            'name' => 'João Paulo ADM',
            'email' => 'dewitt5609@uorak.com',
            'role' => 'admin',
            'password' => Hash::make('37715762'),
        ]);
    }
}
