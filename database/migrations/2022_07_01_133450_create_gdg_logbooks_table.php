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
        Schema::create('gdg_logbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("kodebarang_id")->constrained('gdg_kodebarangs')->cascadeOnDelete();
            $table->string("nama");
            $table->integer("jumlah");
            $table->string("status");
            $table->string("tahun_bulan");
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
        Schema::dropIfExists('gdg_logbooks');
    }
};
