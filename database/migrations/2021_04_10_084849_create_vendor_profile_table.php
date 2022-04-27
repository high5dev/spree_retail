<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_profile', function (Blueprint $table) {
                $table->integerIncrements('id')->from(5000001);
                $table->unsignedInteger('user_id')->unique();
                $table->string('brand_name')->nullable();
                $table->string('brand_website')->nullable();
                $table->string('brand_structure')->nullable();
                $table->string('brand_address')->nullable();
                $table->string('brand_city')->nullable();
                $table->string('brand_country')->nullable();
                $table->string('brand_zipcode')->nullable();
                $table->string('vendor_role')->nullable();
                $table->string('about')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_profile');
    }
}
