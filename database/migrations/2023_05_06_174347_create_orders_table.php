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
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('payment')->nullable();
            $table->string('order_status')->nullable();
            // $table->string('payments.user_id')->nullable();
            // $table->string('payments.user_id')->nullable();
            // $table->foreignId('payment_id')->nullable()->constrained('payments');
            // add this tabke later on table manually


            $table->string('zipcode');
            $table->string('user_id')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('cash_payment')->nullable();
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
