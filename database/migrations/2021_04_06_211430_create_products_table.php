<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integerIncrements('id')->from(2000001);;
            $table->unsignedInteger('user_id');
            $table->string('slug',100)->unique();
            $table->string('main');
            $table->string('featured')->nullable();
            $table->string('name');
            $table->string('price');
            $table->integer('quantity');
            $table->integer('remaining');
            $table->integer('required')->default(0);
            $table->integer('available')->default(0);
            $table->integer('sold')->default(0);
            $table->mediumText('description');
            $table->string('thumbnail');
            $table->string('status');
            $table->date('inactive')->nullable();
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->integer('weight');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
