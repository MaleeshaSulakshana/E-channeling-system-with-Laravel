<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=> 1,
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'id'=> 2,
            'role_name' => 'Patient',
            'role_slug' => 'patient',
        ]);

        DB::table('roles')->insert([
            'id'=> 3,
            'role_name' => 'Doctor',
            'role_slug' => 'doctor',
        ]);
    }
}
