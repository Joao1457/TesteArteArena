<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;

class AccountPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    //policie para checar se o usuario autenticado é admin ou um usuario basico e mostrar o conteúdo
    public function show(User $user, Account $account)
    {
        if (auth::user()->role === 'admin') {
            return $account;
        }

        if ($account->user_id == auth::id()) {
            return $account;
        }
    }

}
