<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //senha do users fake são password
        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => 'João Paulo ADM',
            'email' => 'dewitt5609@uorak.com',
            'role' => 'admin',
            'password' => Hash::make('37715762'),
        ]);

        foreach (User::all() as $user) {
            Account::factory(10)->create([
                'user_id' => $user->id,
            ]);
        }


    }
}
