<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gdg_kodebarangs', function (Blueprint $table) {
            $table->id();
            $table->string("kode")->unique();
            $table->string("jenis");
            $table->text("keterangan");
            $table->string("satuan");
            $table->integer("min_stok");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gdg_kodebarangs');
    }
};
