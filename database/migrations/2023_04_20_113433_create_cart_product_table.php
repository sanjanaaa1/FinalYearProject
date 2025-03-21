<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('quantity');
            $table->string('image');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreignId('product_id_brass')->constrained('brass');
            $table->foreignId('product_id_copper')->constrained('copper');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}
