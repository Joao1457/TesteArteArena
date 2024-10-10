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
