<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['jabatan' => 'admin']);
        Role::create(['jabatan' => 'kepala kelurahan']);
        Role::create(['jabatan' => 'staff kelurahan']);
        Role::create(['jabatan' => 'staff pkk']);
    }
}
