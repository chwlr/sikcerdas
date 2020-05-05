<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        if (Gate::denies('administrator')) {
            return response()->json('Access Denied', 500);
        }
        $data = User::all();
        return response()->json($data);
    }

    // public function edit(User $user)
    // {
    //     $roles = Role::all();
    //     return response()->json(['user' => $user, 'roles' => $roles]);
    // }

    public function update(Request $request, User $user)
    {

        if (Gate::denies('administrator')) {
            return response()->json('Access Denied', 500);
        }

        $user->roles()->sync($request->jabatan);
        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        if (Gate::denies('administrator')) {
            return response()->json('Access Denied', 500);
        }

        $user->roles()->detach();
        $user->delete();
        return response()->json('Data telah terhapus');
    }
}
