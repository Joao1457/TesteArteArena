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

    //função para mudar a role do usuario de admin para basic ou o contrario
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
