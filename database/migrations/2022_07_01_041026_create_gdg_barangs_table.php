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
        Schema::create('gdg_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("kodebarang_id")->constrained('gdg_kodebarangs')->cascadeOnDelete();
            $table->string("nama");
            $table->integer("jumlah");
            $table->date("expired")->nullable();;
            $table->string("gambar")->nullable();
            $table->text("catatan")->nullable();
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
        Schema::dropIfExists('gdg_barangs');
    }
};
