<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_request', function (Blueprint $table) {
            $table->integerIncrements('id')->from(4000001);
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('brand_name');
            $table->string('website_link')->nullable();
            $table->string('structure');
            $table->mediumText('about');
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
        Schema::dropIfExists('vendor_request');
    }
}
