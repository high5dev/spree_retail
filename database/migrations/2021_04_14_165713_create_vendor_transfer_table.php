<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_transfer', function (Blueprint $table) {
            $table->integerIncrements('id')->from(7000001);
            $table->integer('vendor_id')->unsigned();
            $table->integer('order_product_id')->unsigned();
            $table->integer('transfer_amount')->default(0);
            $table->string('error')->nullable();
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('users');
            $table->foreign('order_product_id')->references('id')->on('order_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_transfer');
    }
}
