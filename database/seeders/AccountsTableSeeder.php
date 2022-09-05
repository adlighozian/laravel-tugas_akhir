<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('accounts')->delete();
        
        DB::table('accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 101,
                'name' => 'Kas',
                'type' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 120,
                'name' => 'Piutang',
                'type' => 'Pengeluaran',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 150,
                'name' => 'Pasokan',
                'type' => 'Pengeluaran',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 180,
                'name' => 'Peralatan',
                'type' => 'Pengeluaran',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 210,
                'name' => 'Utang',
                'type' => 'Pemasukan',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 220,
            'name' => 'Pinjaman karyawan (utang gaji)',
                'type' => 'Lainnya',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 290,
                'name' => 'Penarikan oleh owner',
                'type' => 'Pengeluaran',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 310,
            'name' => 'Pendapatan layanan (Revenue) - Cash',
                'type' => 'Pemasukan',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 315,
            'name' => 'Pendapatan layanan (Revenue) - Cashless',
                'type' => 'Pemasukan',
            ),
            9 => 
            array (
                'id' => 11,
                'code' => 510,
                'name' => 'Gaji karyawan',
                'type' => 'Pengeluaran',
            ),
            10 => 
            array (
                'id' => 12,
                'code' => 540,
                'name' => 'Pengeluaran pasokan',
                'type' => 'Lainnya',
            ),
            11 => 
            array (
                'id' => 13,
                'code' => 710,
                'name' => 'Adjustment Pemasukan',
                'type' => 'Lainnya',
            ),
            12 => 
            array (
                'id' => 14,
                'code' => 720,
                'name' => 'Adjustment Pengeluaran',
                'type' => 'Lainnya',
            ),
        ));
        
        
    }
}