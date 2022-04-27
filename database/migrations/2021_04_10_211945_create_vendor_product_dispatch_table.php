<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProductDispatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_product_dispatch', function (Blueprint $table) {
            $table->integerIncrements('id')->from(6000001);
            $table->integer('vendor_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('quantity');
            $table->string('status');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_product_dispatch');
    }
}
