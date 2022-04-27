<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductAttributesTypeInToDecimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('length')->change();
            $table->string('width')->change();
            $table->string('height')->change();
            $table->string('weight')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('length')->change();
            $table->integer('width')->change();
            $table->integer('height')->change();
            $table->integer('weight')->change();
        });
    }
}
