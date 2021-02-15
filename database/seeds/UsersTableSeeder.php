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
        $kpKelRole = Role::where('jabatan', 'kepala kelurahan')->first();
        $stKelRole = Role::where('jabatan', 'staff kelurahan')->first();
        $stPkkRole = Role::where('jabatan', 'staff pkk')->first();

        $admin = User::create([
            'nama' => 'admin user',
            'email' => 'admin@mail.com',
            'jabatan' => 'admin',
            'password' => Hash::make('password')
        ]);

        $kepLurah = User::create([
            'nama' => 'kepala kelurahan',
            'email' => 'anoatest@mail.com',
            'jabatan' => 'kepala kelurahan',
            'password' => Hash::make('password')
        ]);

        $stfLurah = User::create([
            'nama' => 'staff_kelurahan',
            'email' => 'staff_kelurahan@mail.com',
            'jabatan' => 'staff kelurahan',
            'password' => Hash::make('password')
        ]);

        $stfPkk = User::create([
            'nama' => 'staff_pkk',
            'email' => 'staff_pkk@mail.com',
            'jabatan' => 'staff pkk',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $kepLurah->roles()->attach($kpKelRole);
        $stfLurah->roles()->attach($stKelRole);
        $stfPkk->roles()->attach($stPkkRole);
    }
}
