<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Account;
use App\Models\User;
use Database\Seeders\AccountSeeder;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_accounts_index(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('accounts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('accounts.index');
    }

    public function test_it_displays_create_account_form(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('accounts.create'));

        $response->assertStatus(200);
        $response->assertViewIs('accounts.create');
    }

    public function test_it_stores_new_account(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'titulo' => 'Nova Conta',
            'descricao' => 'Descrição da nova conta',
            'valor' => 100.00,
            'data_vencimento' => now()->addDays(7)->format('Y-m-d'),
            'status' => 'pendente',
        ];

        $response = $this->post(route('accounts.store'), $data);

        $response->assertRedirect(route('accounts.index'));
        $this->assertDatabaseHas('accounts', [
            'titulo' => 'Nova Conta',
            'descricao' => 'Descrição da nova conta',
            'valor' => 100.00,
            'data_vencimento' => now()->addDays(7)->format('Y-m-d'),
            'status' => 'pendente',
        ]);
    }

    // public function test_it_displays_specific_account(): void
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);

    //     $account = Account::factory()->create(['user_id' => $user->id]);

    //     $response = $this->get(route('accounts.show', $account->id));

    //     $response->assertStatus(200);
    //     $response->assertViewIs('report');
    //     $response->assertViewHas('accounts', $account);
    // }

    public function test_it_updates_account(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $account = Account::factory()->create();

        $newData = [
            'titulo' => 'Conta de Luz Atualizada',
            'descricao' => 'Conta de energia elétrica atualizada',
            'valor' => 300.50,
            'data_vencimento' => '2024-11-01',
            'status' => 'pendente',
        ];

        $response = $this->put(route('accounts.update', $account->id), $newData);

        $response->assertRedirect(route('accounts.index'));
        $this->assertDatabaseHas('accounts', $newData);
    }

    // public function test_it_deletes_account(): void
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);

    //     $account = Account::factory()->create();

    //     $response = $this->delete(route('accounts.destroy', $account->id));

    //     $response->assertRedirect(route('accounts.index'));
    //     $this->assertDatabaseMissing('accounts', ['id' => $account->id]);
    // }

    public function testIt_fails_validation_on_missing_required_fields(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [];

        $response = $this->post(route('accounts.store'), $data);

        $response->assertSessionHasErrors(['titulo', 'descricao', 'valor', 'data_vencimento', 'status']);
    }
}
