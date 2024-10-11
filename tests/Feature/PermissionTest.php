<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use App\Models\Account;


class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_show_any_account()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $account = Account::factory()->create();

        $this->actingAs($admin);
        $this->assertTrue($admin->can('show', $account));
    }

    /** @test */
    public function owner_can_show_own_account()
    {
        $user = User::factory()->create(['role' => 'user']);

        $account = Account::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);
        $this->assertTrue($user->can('show', $account));
    }

    /** @test */
    public function non_owner_cannot_show_account()
    {
        $user1 = User::factory()->create(['role' => 'user']);
        $user2 = User::factory()->create(['role' => 'user']);

        $account = Account::factory()->create(['user_id' => $user1->id]);

        $this->actingAs($user2);
        $this->assertFalse($user2->can('show', $account));
    }

    public function test_is_admin_returns_true_for_admin_user()
    {
        $adminUser = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($adminUser->isAdmin());
    }

    public function test_is_admin_returns_false_for_non_admin_user()
    {
        $basicUser = User::factory()->create(['role' => 'user']);

        $this->assertFalse($basicUser->isAdmin());
    }
}
