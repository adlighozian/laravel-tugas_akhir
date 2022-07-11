<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
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
            3 => 
            array (
                'id' => 4,
                'jenis' => 'pos',
                'sumber' => 'Operasi',
                'tanggal' => '2022-07-07',
                'nominal' => 100000.0,
                'pajak' => NULL,
                'service' => NULL,
                'income' => NULL,
                'bukti' => NULL,
                'keterangan' => 'Tambal Ban Angkot',
                'status' => 'waiting',
            ),
            4 => 
            array (
                'id' => 5,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cashless',
                'tanggal' => '2022-07-06',
                'nominal' => 100000.0,
                'pajak' => NULL,
                'service' => NULL,
                'income' => NULL,
                'bukti' => NULL,
                'keterangan' => 'Yayyy',
                'status' => 'waiting',
            ),
            5 => 
            array (
                'id' => 6,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-06-30',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Uwooow',
                'status' => 'waiting',
            ),
            6 => 
            array (
                'id' => 7,
                'jenis' => 'Pengeluaran',
                'sumber' => 'Operasi',
                'tanggal' => '2022-07-07',
                'nominal' => 400000.0,
                'pajak' => NULL,
                'service' => NULL,
                'income' => NULL,
                'bukti' => NULL,
                'keterangan' => 'Gaada keterangan',
                'status' => 'waiting',
            ),
            7 => 
            array (
                'id' => 8,
                'jenis' => 'Pengeluaran',
                'sumber' => 'Operasi',
                'tanggal' => '2022-08-01',
                'nominal' => 720000.0,
                'pajak' => NULL,
                'service' => NULL,
                'income' => NULL,
                'bukti' => NULL,
                'keterangan' => 'Ini keterangan',
                'status' => 'waiting',
            ),
        ));
        
        
    }
}