<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integerIncrements('id')->from(3000001);
            $table->integer('user_id')->unsigned();
            $table->string('charge_id');
            $table->integer('user_address');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('billing_email')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_app_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_postalcode')->nullable();
            $table->string('billing_name_on_card')->nullable();
            $table->integer('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->integer('billing_subtotal')->default(0);;
            $table->integer('billing_tax')->default(0);;
            $table->integer('billing_total')->default(0);;
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            $table->string('status')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('fedex_delivery')->nullable();
            $table->string('fedex_price')->nullable();
            $table->timestamp('fedex_time')->nullable();
            $table->string('fedex_tracking_id')->nullable();
            $table->string('error')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
