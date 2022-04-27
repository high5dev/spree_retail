<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliverAndCancelReasonToOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            //
            $table->string('cancel_reason')->nullable();
            $table->boolean('delivered')->default(false);
            $table->dateTime('delivered_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            //
            $table->dropColumn('cancel_reason');
            $table->dropColumn('delivered');
            $table->dropColumn('delivered_at');
        });
    }
}
