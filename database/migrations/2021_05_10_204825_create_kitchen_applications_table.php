<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitchenApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_applications', function (Blueprint $table) {
            $table->integerIncrements('id')->from('13000001');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('business_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
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
        Schema::dropIfExists('kitchen_applications');
    }
}
