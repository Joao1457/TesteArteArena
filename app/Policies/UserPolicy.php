<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    //policie para checar se o usuario esta como admin na role
    public function isAdmin(User $user){
        return $user->role == 'admin';
    }
}
