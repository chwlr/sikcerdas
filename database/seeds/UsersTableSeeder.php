<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('jabatan', 'admin')->first();
        $lurahRole = Role::where('jabatan', 'lurah')->first();
        $staffRole = Role::where('jabatan', 'staff')->first();

        $admin = User::create([
            'nama' => 'tole',
            'email' => 'toletest@mail.com',
            'jabatan' => 'admin',
            'password' => Hash::make('qwe123qwe')
        ]);

        $lurah = User::create([
            'nama' => 'anoa',
            'email' => 'anoatest@mail.com',
            'jabatan' => 'lurah',
            'password' => Hash::make('qwe123qwe')
        ]);

        $staff = User::create([
            'nama' => 'inem',
            'email' => 'inemtest@mail.com',
            'jabatan' => 'staff',
            'password' => Hash::make('qwe123qwe')
        ]);

        $admin->roles()->attach($adminRole);
        $lurah->roles()->attach($lurahRole);
        $staff->roles()->attach($staffRole);
    }
}
