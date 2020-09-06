<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->bigIncrements('order_details_id');
             $table->unsignedBigInteger('order_id');
              $table->unsignedBigInteger('product_id');
               $table->string('product_name');
                $table->float('product_price');
                 $table->integer('product_sales_quantity');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('tbl_order');
            $table->foreign('product_id')->references('product_id')->on('tbl_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order_details');
    }
}
