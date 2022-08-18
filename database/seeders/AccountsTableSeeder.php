<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accounts')->delete();
        
        \DB::table('accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 101,
                'name' => 'Kas',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 120,
                'name' => 'Piutang',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 150,
                'name' => 'Pasokan',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 180,
                'name' => 'Peralatan',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 210,
                'name' => 'Utang',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 220,
                'name' => 'Utang gaji',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 230,
                'name' => 'Utang sewa gedung',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 240,
                'name' => 'Pendapatan diterima dimuka',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 290,
                'name' => 'Ekuitas pemilik',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 310,
                'name' => 'Pendapatan layanan',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 510,
                'name' => 'Pengeluaran gaji',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 540,
                'name' => 'Pengeluaran pasokan',
            ),
        ));
        
        
    }
}