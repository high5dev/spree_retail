<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeSizeIdToSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sizes', function (Blueprint $table) {
            //            
            $table->unsignedBigInteger('type_size_id');
            $table->dropColumn('product_type');
            $table->foreign('type_size_id')
                  ->references('id')
                  ->on('type_sizes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sizes', function (Blueprint $table) {
            //
            $table->dropColumn('type_size_id');
            $table->string('product_type');
        });
    }
}
