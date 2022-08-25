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
                'id' => 9,
                'code' => 290,
                'name' => 'Penarikan oleh owner',
                'type' => 'Pengeluaran',
            ),
            7 => 
            array (
                'id' => 10,
                'code' => 310,
            'name' => 'Pendapatan layanan (Revenue)',
                'type' => 'Pemasukan',
            ),
            8 => 
            array (
                'id' => 11,
                'code' => 510,
                'name' => 'Gaji karyawan',
                'type' => 'Pengeluaran',
            ),
            9 => 
            array (
                'id' => 12,
                'code' => 540,
                'name' => 'Pengeluaran pasokan',
                'type' => 'Lainnya',
            ),
        ));
        
        
    }
}