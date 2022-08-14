<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('jenis');
            $table->string('sumber');
            $table->date('tanggal');
            $table->float('nominal', 10, 0);
            $table->float('pajak', 10, 0)->nullable();
            $table->float('service', 10, 0)->nullable();
            $table->float('income', 10, 0)->nullable();
            $table->string('bukti')->nullable();
            $table->string('keterangan');
            $table->string('status')->default('waiting');
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
        Schema::dropIfExists('transactions');
    }
}
