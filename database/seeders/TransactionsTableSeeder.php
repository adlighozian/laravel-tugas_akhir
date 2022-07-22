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
            8 => 
            array (
                'id' => 9,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-01-01',
                'nominal' => 400000.0,
                'pajak' => 40000.0,
                'service' => 40000.0,
                'income' => 320000.0,
                'bukti' => NULL,
                'keterangan' => '1 Januari',
                'status' => 'waiting',
            ),
            9 => 
            array (
                'id' => 10,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-01-12',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan januari',
                'status' => 'waiting',
            ),
            10 => 
            array (
                'id' => 11,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-02-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Februari',
                'status' => 'waiting',
            ),
            11 => 
            array (
                'id' => 12,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-03-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Maret',
                'status' => 'waiting',
            ),
            12 => 
            array (
                'id' => 13,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-04-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan April',
                'status' => 'waiting',
            ),
            13 => 
            array (
                'id' => 14,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-05-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Mei',
                'status' => 'waiting',
            ),
            14 => 
            array (
                'id' => 15,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-06-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Juni',
                'status' => 'waiting',
            ),
            15 => 
            array (
                'id' => 16,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-07-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Juli',
                'status' => 'waiting',
            ),
            16 => 
            array (
                'id' => 17,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-08-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Agustus',
                'status' => 'waiting',
            ),
            17 => 
            array (
                'id' => 18,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-09-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan September',
                'status' => 'waiting',
            ),
            18 => 
            array (
                'id' => 19,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-10-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Oktober',
                'status' => 'waiting',
            ),
            19 => 
            array (
                'id' => 20,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-11-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan November',
                'status' => 'waiting',
            ),
            20 => 
            array (
                'id' => 21,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2022-12-16',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Desember',
                'status' => 'waiting',
            ),
            21 => 
            array (
                'id' => 22,
                'jenis' => 'Pemasukan',
                'sumber' => 'Cash',
                'tanggal' => '2021-12-29',
                'nominal' => 1000000.0,
                'pajak' => 100000.0,
                'service' => 100000.0,
                'income' => 800000.0,
                'bukti' => NULL,
                'keterangan' => 'Pemasukan Desember 2021',
                'status' => 'waiting',
            ),
        ));
        
        
    }
}