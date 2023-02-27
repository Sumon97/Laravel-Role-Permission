<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   public function list()
   {
        $users = User::all();
        return view('users.list', compact('users'));
   }


      public function userShow($id)
   {
        $user = User::find($id);
        $roles = Role::all();

        //$role = $request->role;

        //$user->assignRole($role);
        return view('users.show', compact('user', 'roles'));
   }


         public function userUpdate( Request $request, $id)
   {
        $user = User::find($id);
      
        //$role = $request->role;

        $user->assignRole($request->role);
        return redirect()->route('user.list')
            ->with('success', 'Role updated successfully.');
   }
}
