<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Admin',
            'last_name' => 'One',
            'gender' => 'male',
            'address'=> 'New Town, Aruba',
            'date_of_birth' => '1996-05-06',
            'mobileNo' => '0717185147',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Patient',
            'last_name' => 'One',
            'gender' => 'male',
            'address'=> 'New Town, Aruba',
            'date_of_birth' => '1996-05-06',
            'mobileNo' => '0717185146',
            'email' => 'patient@patient.com',
            'password' => Hash::make('patient'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'first_name' => 'Doctor',
            'last_name' => 'One',
            'gender' => 'male',
            'address'=> 'New Town, Aruba',
            'date_of_birth' => '1996-05-06',
            'mobileNo' => '0717185148',
            'email' => 'doctor@doctor.com',
            'password' => Hash::make('doctor'),
        ]);

        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Admin',
            'last_name' => 'Two',
            'gender' => 'male',
            'address'=> 'New Town, Aruba',
            'date_of_birth' => '1996-05-06',
            'mobileNo' => '0717185140',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
