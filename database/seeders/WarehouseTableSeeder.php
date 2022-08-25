<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\gdgKodebarang;
use App\Models\gdgBarang;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // KODE_BARANG START
        DB::table('gdg_kodebarangs')->delete();
        gdgKodebarang::create([
            'id' => 1,
            'jenis' => "Bahan pokok",
            'keterangan' => "Untuk bahan pokok",
            'satuan' => "Potong",
            'min_stok' => 10,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        gdgKodebarang::create([
            'id' => 2,
            'jenis' => "Sayuran",
            'keterangan' => "Untuk sayuran",
            'satuan' => "Ikat",
            'min_stok' => 10,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        // KODE_BARANG END
        DB::table('gdg_barangs')->delete();
        gdgBarang::create([
            'kodebarang_id' => 1,
            'nama' => "ayam",
            'jumlah' => 0,
            'gambar' => NULL,
            'catatan' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        gdgBarang::create([
            'kodebarang_id' => 1,
            'nama' => "ikan",
            'jumlah' => 10,
            'gambar' => NULL,
            'catatan' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        gdgBarang::create([
            'kodebarang_id' => 2,
            'nama' => "Terong",
            'jumlah' => 20,
            'gambar' => NULL,
            'catatan' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
        gdgBarang::create([
            'kodebarang_id' => 1,
            'nama' => "Kol",
            'jumlah' => 5,
            'gambar' => NULL,
            'catatan' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
    }
}
