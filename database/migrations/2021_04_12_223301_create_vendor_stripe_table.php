<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorStripeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_stripe', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('vendor_id')->unsigned();
            $table->string('account_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_stripe');
    }
}
