<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'titulo' => 'Conta de Luz',
            'descricao' => 'Conta de energia elétrica',
            'valor' => 150.75,
            'data_vencimento' => '2024-10-15',
            'status' => 'pago',
        ],
    );


    }
}
