<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('journals')->delete();
        
        DB::table('journals')->insert(array (
            0 => 
            array (
                'id' => 9,
                'account_id' => 8,
                'debit' => 0.0,
                'credit' => 900000.0,
                'tanggal' => '2021-01-01',
                'created_at' => '2022-08-28 21:00:49',
                'updated_at' => '2022-08-28 21:00:49',
            ),
            1 => 
            array (
                'id' => 10,
                'account_id' => 1,
                'debit' => 900000.0,
                'credit' => 0.0,
                'tanggal' => '2021-01-01',
                'created_at' => '2022-08-28 21:00:49',
                'updated_at' => '2022-08-28 21:00:49',
            ),
            2 => 
            array (
                'id' => 11,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 480000.0,
                'tanggal' => '2021-01-05',
                'created_at' => '2022-08-28 21:01:52',
                'updated_at' => '2022-08-28 21:01:52',
            ),
            3 => 
            array (
                'id' => 12,
                'account_id' => 1,
                'debit' => 480000.0,
                'credit' => 0.0,
                'tanggal' => '2021-01-05',
                'created_at' => '2022-08-28 21:01:52',
                'updated_at' => '2022-08-28 21:01:52',
            ),
            4 => 
            array (
                'id' => 13,
                'account_id' => 8,
                'debit' => 0.0,
                'credit' => 1000000.0,
                'tanggal' => '2022-01-31',
                'created_at' => '2022-08-28 21:03:03',
                'updated_at' => '2022-08-28 21:03:03',
            ),
            5 => 
            array (
                'id' => 14,
                'account_id' => 1,
                'debit' => 1000000.0,
                'credit' => 0.0,
                'tanggal' => '2022-01-31',
                'created_at' => '2022-08-28 21:03:03',
                'updated_at' => '2022-08-28 21:03:03',
            ),
            6 => 
            array (
                'id' => 15,
                'account_id' => 11,
                'debit' => 8000000.0,
                'credit' => 0.0,
                'tanggal' => '2022-01-31',
                'created_at' => '2022-08-28 21:20:09',
                'updated_at' => '2022-08-28 21:20:09',
            ),
            7 => 
            array (
                'id' => 16,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 8000000.0,
                'tanggal' => '2022-01-31',
                'created_at' => '2022-08-28 21:20:09',
                'updated_at' => '2022-08-28 21:20:09',
            ),
            8 => 
            array (
                'id' => 17,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 3400000.0,
                'tanggal' => '2021-01-20',
                'created_at' => '2022-08-28 21:21:35',
                'updated_at' => '2022-08-28 21:21:35',
            ),
            9 => 
            array (
                'id' => 18,
                'account_id' => 1,
                'debit' => 3400000.0,
                'credit' => 0.0,
                'tanggal' => '2021-01-20',
                'created_at' => '2022-08-28 21:21:35',
                'updated_at' => '2022-08-28 21:21:35',
            ),
            10 => 
            array (
                'id' => 19,
                'account_id' => 8,
                'debit' => 0.0,
                'credit' => 2300000.0,
                'tanggal' => '2021-02-02',
                'created_at' => '2022-08-28 21:22:44',
                'updated_at' => '2022-08-28 21:22:44',
            ),
            11 => 
            array (
                'id' => 20,
                'account_id' => 1,
                'debit' => 2300000.0,
                'credit' => 0.0,
                'tanggal' => '2021-02-02',
                'created_at' => '2022-08-28 21:22:44',
                'updated_at' => '2022-08-28 21:22:44',
            ),
            12 => 
            array (
                'id' => 21,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 5200000.0,
                'tanggal' => '2021-02-12',
                'created_at' => '2022-08-28 21:23:29',
                'updated_at' => '2022-08-28 21:23:29',
            ),
            13 => 
            array (
                'id' => 22,
                'account_id' => 1,
                'debit' => 5200000.0,
                'credit' => 0.0,
                'tanggal' => '2021-02-12',
                'created_at' => '2022-08-28 21:23:29',
                'updated_at' => '2022-08-28 21:23:29',
            ),
            14 => 
            array (
                'id' => 23,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 1400000.0,
                'tanggal' => '2021-02-27',
                'created_at' => '2022-08-28 21:26:46',
                'updated_at' => '2022-08-28 21:26:46',
            ),
            15 => 
            array (
                'id' => 24,
                'account_id' => 1,
                'debit' => 1400000.0,
                'credit' => 0.0,
                'tanggal' => '2021-02-27',
                'created_at' => '2022-08-28 21:26:46',
                'updated_at' => '2022-08-28 21:26:46',
            ),
            16 => 
            array (
                'id' => 25,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 81000.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:16:57',
                'updated_at' => '2022-08-29 13:16:57',
            ),
            17 => 
            array (
                'id' => 26,
                'account_id' => 1,
                'debit' => 81000.0,
                'credit' => 0.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:16:57',
                'updated_at' => '2022-08-29 13:16:57',
            ),
            18 => 
            array (
                'id' => 27,
                'account_id' => 8,
                'debit' => 0.0,
                'credit' => 20000.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:17:17',
                'updated_at' => '2022-08-29 13:17:17',
            ),
            19 => 
            array (
                'id' => 28,
                'account_id' => 1,
                'debit' => 20000.0,
                'credit' => 0.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:17:17',
                'updated_at' => '2022-08-29 13:17:17',
            ),
            20 => 
            array (
                'id' => 29,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 84000.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:17:36',
                'updated_at' => '2022-08-29 13:17:36',
            ),
            21 => 
            array (
                'id' => 30,
                'account_id' => 1,
                'debit' => 84000.0,
                'credit' => 0.0,
                'tanggal' => '2022-08-29',
                'created_at' => '2022-08-29 13:17:36',
                'updated_at' => '2022-08-29 13:17:36',
            ),
            22 => 
            array (
                'id' => 31,
                'account_id' => 11,
                'debit' => 6000000.0,
                'credit' => 0.0,
                'tanggal' => '2021-06-25',
                'created_at' => '2022-09-02 19:32:01',
                'updated_at' => '2022-09-02 19:32:01',
            ),
            23 => 
            array (
                'id' => 32,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 6000000.0,
                'tanggal' => '2021-06-25',
                'created_at' => '2022-09-02 19:32:01',
                'updated_at' => '2022-09-02 19:32:01',
            ),
            24 => 
            array (
                'id' => 33,
                'account_id' => 11,
                'debit' => 8000000.0,
                'credit' => 0.0,
                'tanggal' => '2022-04-30',
                'created_at' => '2022-09-02 19:41:01',
                'updated_at' => '2022-09-02 19:41:01',
            ),
            25 => 
            array (
                'id' => 34,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 8000000.0,
                'tanggal' => '2022-04-30',
                'created_at' => '2022-09-02 19:41:01',
                'updated_at' => '2022-09-02 19:41:01',
            ),
            26 => 
            array (
                'id' => 35,
                'account_id' => 8,
                'debit' => 0.0,
                'credit' => 490000.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:49:42',
                'updated_at' => '2022-09-02 19:49:42',
            ),
            27 => 
            array (
                'id' => 36,
                'account_id' => 1,
                'debit' => 490000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:49:42',
                'updated_at' => '2022-09-02 19:49:42',
            ),
            28 => 
            array (
                'id' => 37,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 78000.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:51:15',
                'updated_at' => '2022-09-02 19:51:15',
            ),
            29 => 
            array (
                'id' => 38,
                'account_id' => 1,
                'debit' => 78000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:51:15',
                'updated_at' => '2022-09-02 19:51:15',
            ),
            30 => 
            array (
                'id' => 39,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 78000.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:51:32',
                'updated_at' => '2022-09-02 19:51:32',
            ),
            31 => 
            array (
                'id' => 40,
                'account_id' => 1,
                'debit' => 78000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 19:51:32',
                'updated_at' => '2022-09-02 19:51:32',
            ),
            32 => 
            array (
                'id' => 41,
                'account_id' => 11,
                'debit' => 8000000.0,
                'credit' => 0.0,
                'tanggal' => '2022-08-30',
                'created_at' => '2022-09-02 19:59:47',
                'updated_at' => '2022-09-02 19:59:47',
            ),
            33 => 
            array (
                'id' => 42,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 8000000.0,
                'tanggal' => '2022-08-30',
                'created_at' => '2022-09-02 19:59:47',
                'updated_at' => '2022-09-02 19:59:47',
            ),
            34 => 
            array (
                'id' => 43,
                'account_id' => 4,
                'debit' => 400000.0,
                'credit' => 0.0,
                'tanggal' => '2022-08-17',
                'created_at' => '2022-09-02 20:11:32',
                'updated_at' => '2022-09-02 20:11:32',
            ),
            35 => 
            array (
                'id' => 44,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 400000.0,
                'tanggal' => '2022-08-17',
                'created_at' => '2022-09-02 20:11:32',
                'updated_at' => '2022-09-02 20:11:32',
            ),
            36 => 
            array (
                'id' => 45,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 94500.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 20:43:15',
                'updated_at' => '2022-09-02 20:43:15',
            ),
            37 => 
            array (
                'id' => 46,
                'account_id' => 1,
                'debit' => 94500.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 20:43:15',
                'updated_at' => '2022-09-02 20:43:15',
            ),
            38 => 
            array (
                'id' => 47,
                'account_id' => 2,
                'debit' => 300000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 20:59:41',
                'updated_at' => '2022-09-02 20:59:41',
            ),
            39 => 
            array (
                'id' => 48,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 300000.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 20:59:41',
                'updated_at' => '2022-09-02 20:59:41',
            ),
            40 => 
            array (
                'id' => 49,
                'account_id' => 3,
                'debit' => 350000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 21:02:48',
                'updated_at' => '2022-09-02 21:02:48',
            ),
            41 => 
            array (
                'id' => 50,
                'account_id' => 1,
                'debit' => 0.0,
                'credit' => 350000.0,
                'tanggal' => '2022-09-02',
                'created_at' => '2022-09-02 21:02:48',
                'updated_at' => '2022-09-02 21:02:48',
            ),
            42 => 
            array (
                'id' => 51,
                'account_id' => 9,
                'debit' => 0.0,
                'credit' => 720000.0,
                'tanggal' => '2022-09-03',
                'created_at' => '2022-09-03 08:51:13',
                'updated_at' => '2022-09-03 08:51:13',
            ),
            43 => 
            array (
                'id' => 52,
                'account_id' => 1,
                'debit' => 720000.0,
                'credit' => 0.0,
                'tanggal' => '2022-09-03',
                'created_at' => '2022-09-03 08:51:13',
                'updated_at' => '2022-09-03 08:51:13',
            ),
        ));
        
        
    }
}