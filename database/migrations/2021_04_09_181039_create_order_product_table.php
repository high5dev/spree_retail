<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')
                ->on('orders');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products');

            $table->integer('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')
                ->on('users');

            $table->integer('quantity');
            $table->integer('price');
            $table->string('status');
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
        Schema::dropIfExists('order_product');
    }
}
