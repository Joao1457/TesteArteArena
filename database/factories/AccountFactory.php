<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AccountFactory extends Factory
{

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->text(100),
            'valor' => $this->faker->randomFloat(2, 50, 1000),
            'data_vencimento' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['pago', 'pendente']),
            'user_id' => User::factory(),
        ];
    }

}
