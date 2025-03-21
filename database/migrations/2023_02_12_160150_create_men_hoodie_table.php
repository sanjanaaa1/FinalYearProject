<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenHoodieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men_hoodie', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable;
            $table->bigInteger('price');
            $table->string('category_name');
            $table->string('image')->nullable();
            $table->integer('Quantity');


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
        Schema::dropIfExists('men_hoodie');
    }
}
