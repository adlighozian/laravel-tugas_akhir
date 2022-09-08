<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'email' => 'admin@mail.com',
                'password' => '$2y$10$hJV6yIwEo/isfYDi1UEH9uNsbRlWKzEWd1WcJVsYpabwDzTBSUsIi',
                'no_telp' => '08123456789',
                'role' => 'admin',
                'profile_picture' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'email' => 'keuangan@mail.com',
                'password' => Hash::make('11111111'),
                'no_telp' => '08123456789',
                'role' => 'keuangan',
                'profile_picture' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'email' => 'pos@mail.com',
                'password' => Hash::make('11111111'),
                'no_telp' => '08123456789',
                'role' => 'pos',
                'profile_picture' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'email' => 'gudang@mail.com',
                'password' => Hash::make('gudang1221'),
                'no_telp' => '08123456789',
                'role' => 'gudang',
                'profile_picture' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'email' => 'dapur@mail.com',
                'password' => Hash::make('11111111'),
                'no_telp' => '08123456789',
                'role' => 'dapur',
                'profile_picture' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
