<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('img');
            $table->text('asin');
            $table->text('price');
            $table->text('reviews');
            $table->text('sa_link');
            $table->text('sa_price');
            $table->text('ae_link');
            $table->text('ae_price');
            $table->text('uk_link');
            $table->text('uk_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
