<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shipping_id');
            $table->unsignedBigInteger('payment_id');
            $table->float('order_total');
            $table->integer('order_status');
         
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_id')->references('shipping_id')->on('tbl_shipping')->onDelete('cascade');
            $table->foreign('payment_id')->references('payment_id')->on('tbl_payment')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
}
