<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gdg_barangs')->delete();
        DB::table('gdg_barangs')->insert(array(
            0 =>
            array(
                'id' => 1,
                'kodebarang_id' => 1,
                'nama' => "ayam",
                'jumlah' => 20,
                'expired' => NULL,
                'gambar' => NULL,
                'catatan' => NULL,
                'created_at' => Date('m-d-Y h:i:s'),
                'updated_at' => Date('m-d-Y h:i:s'),
            ),
            1 =>
            array(
                'id' => 2,
                'kodebarang_id' => 1,
                'nama' => "bebek",
                'jumlah' => 8,
                'expired' => NULL,
                'gambar' => NULL,
                'catatan' => NULL,
                'created_at' => Date('m-d-Y h:i:s'),
                'updated_at' => Date('m-d-Y h:i:s'),
            ),
            2 =>
            array(
                'id' => 3,
                'kodebarang_id' => 1,
                'nama' => "sapi",
                'jumlah' => 0,
                'expired' => NULL,
                'gambar' => NULL,
                'catatan' => NULL,
                'created_at' => Date('m-d-Y h:i:s'),
                'updated_at' => Date('m-d-Y h:i:s'),
            ),
        ));

        DB::table('gdg_kodebarangs')->delete();
        DB::table('gdg_kodebarangs')->insert(array(
            0 =>
            array(
                'id' => 1,
                'kode' => "#BHNPK",
                'jenis' => "Bahan pokok",
                'keterangan' => "Untuk bahan pokok",
                'satuan' => "Potong",
                'min_stok' => 10,
                'created_at' => Date('m-d-Y h:i:s'),
                'updated_at' => Date('m-d-Y h:i:s'),
            ),
        ));
    }
}
