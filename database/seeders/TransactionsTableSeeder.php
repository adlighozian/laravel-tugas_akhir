<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('transactions')->delete();
        
        DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-07-04',
                'nominal' => 500000.0,
                'pajak' => 50000.0,
                'service' => 50000.0,
                'income' => 400000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Bulan Juni',
                'status' => 'waiting',
            ),
            1 => 
            array (
                'id' => 2,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-07-31',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Bulan Juli',
                'status' => 'waiting',
            ),
            2 => 
            array (
                'id' => 3,
                'jenis' => 'Pengeluaran',
                'sumber' => 'Belanja',
                'tanggal' => '2022-07-02',
                'nominal' => 450000.0,
                'pajak' => NULL,
                'service' => NULL,
                'income' => NULL,
                'bukti' => NULL,
                'keterangan' => 'Belanja ABC',
                'status' => 'waiting',
            ),
        ));
        
        
    }
}