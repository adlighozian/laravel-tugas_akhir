<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('menu')->delete();

        DB::table('menu')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Ayam goreng',
                'description' => 'Ayam yang digoreng',
                'ingredients' => 'Gaada',
                'category_id' => 2,
                'price' => 27000,
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-07-05 13:37:05',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Minuman Segar',
                'description' => 'Wowww segarr',
                'ingredients' => 'Air',
                'category_id' => 3,
                'price' => 10000,
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Rokok',
                'description' => 'Pembunuh massal.',
                'ingredients' => 'Racun',
                'category_id' => 4,
                'price' => 49000,
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
