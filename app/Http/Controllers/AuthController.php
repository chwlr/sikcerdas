<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Gate;
use App\Role;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(['token' => $token], 200);
    }

    public function register(Request $request)
    {
        if (Gate::denies('admin')) {
            return response()->json('Access Denied', 500);
        }

        $adminRole = Role::where('jabatan', 'admin')->first();
        $kpKelRole = Role::where('jabatan', 'kepala kelurahan')->first();
        $stKelRole = Role::where('jabatan', 'staff kelurahan')->first();
        $stPkkRole = Role::where('jabatan', 'staff pkk')->first();

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jabatan' => 'required',
            'password' => 'required'
            // 'jabatan' => 'required|string|max:255',
            // 'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'nama' => $request->get('nama'),
            'email' => $request->get('email'),
            'jabatan' => $request->get('jabatan'),
            'password' => Hash::make($request->get('password'))
        ]);

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


        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(['user' => $user]);
    }
}
