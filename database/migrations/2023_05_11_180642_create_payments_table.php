<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('payment_type');
            $table->string('status');
            $table->integer('amount');
            $table->integer('fee_amount');
            $table->string('user_name');
            $table->string('user_mobile');
            $table->string('merchant_name');
            $table->string('merchant_mobile');
            $table->string('product_identity');
            $table->json('response');
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
        Schema::dropIfExists('payments');
    }
}
