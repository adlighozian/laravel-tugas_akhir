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
        Schema::create('gdg_expireds', function (Blueprint $table) {
            $table->id();
            $table->foreignId("barang_id")->constrained('gdg_barangs')->cascadeOnDelete();
            $table->date("expired")->nullable();
            $table->date("tanggal")->nullable();
            $table->integer("jumlah");
            $table->integer("status");
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
        Schema::dropIfExists('gdg_expireds');
    }
};
