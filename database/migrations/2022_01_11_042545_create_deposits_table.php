<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('transaction_id')->default(0);
            $table->string('amount');
            $table->string('charge')->default(0);
            $table->string('final_amount')->default(0);
            $table->string('gateway');
            $table->string('wallet_name');
            $table->enum('status', ['pending', 'success', 'fail']);
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
