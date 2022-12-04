<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('trxid')->unique();
            $table->string('description')->nullable();
            $table->string('amount');
            $table->enum('type', ['deposit', 'manual_deposit', 'send_money', 'referral', 'withdraw', 'receive_money','payment','make_payment']);
            $table->string('charge')->default(0);
            $table->string('final_amount')->default(0);
            $table->string('gateway')->nullable();
            $table->string('wallet_name')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->enum('status', ['pending', 'success', 'fail']);
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
        Schema::dropIfExists('transactions');
    }
}
