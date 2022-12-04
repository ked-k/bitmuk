<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('payment_id')->unique();
            $table->string('ref_code');
            $table->string('currency');
            $table->string('amount');
            $table->string('ipn_url');
            $table->string('cancel_url');
            $table->string('success_url');
            $table->string('customer_email');
            $table->string('api_mode');
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
        Schema::dropIfExists('merchant_payments');
    }
}
