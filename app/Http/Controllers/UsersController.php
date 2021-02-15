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
        if (Gate::denies('admin')) {
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

        if (Gate::denies('admin')) {
            return response()->json('Access Denied', 500);
        }

        $adminRole = Role::where('jabatan', 'admin')->first();
        $kpKelRole = Role::where('jabatan', 'kepala kelurahan')->first();
        $stKelRole = Role::where('jabatan', 'staff kelurahan')->first();
        $stPkkRole = Role::where('jabatan', 'staff pkk')->first();

        $user->update($request->all());

        if ($request->jabatan == 'admin') {
            $user->roles()->attach($adminRole);
        }
        if ($request->jabatan == 'kepala kelurahan') {
            $user->roles()->attach($kpKelRole);
        }
        if ($request->jabatan == 'staff kelurahan') {
            $user->roles()->attach($stKelRole);
        }
        if ($request->jabatan == 'staff pkk') {
            $user->roles()->attach($stPkkRole);
        }



        return response()->json($user);
    }

    public function destroy(User $user)
    {
        if (Gate::denies('admin')) {
            return response()->json('Access Denied', 500);
        }

        $user->roles()->detach();
        $user->delete();
        return response()->json('Data telah terhapus');
    }
}
