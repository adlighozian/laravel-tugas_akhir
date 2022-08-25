<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('table_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->foreignId('menu_id')->constrained('menu')->onDelete('cascade');
            $table->integer('total_order');
            $table->date('tanggal')->nullable();
            $table->integer('price_qty');
            $table->integer('total_price');
            $table->string('payment_type')->nullable();
            $table->boolean('is_done')->nullable();
            $table->integer('status')->nullable();
            $table->integer('status_pembayaran')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
