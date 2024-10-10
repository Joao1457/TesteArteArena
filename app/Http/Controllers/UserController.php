<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users',compact('users'));
    }

    public function updateRoles(Request $request){

        $roles = $request->input('role');

        foreach ($roles as $userId => $role){
            $user = User::find($userId);
            if($user){
                $user->role = $role;
                $user->save();
            }
        }
        return redirect()->back()->with('status','Alterações atualizadas com sucesso!');
    }
}
