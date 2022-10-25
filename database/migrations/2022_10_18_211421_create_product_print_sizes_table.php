<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_print_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_print_id');
            $table->foreign('product_print_id')->references('id')->on('product_prints');
            $table->string('print_size');
            $table->decimal('price');
            $table->string('sku');
            $table->string('paypal_id')->nullable();
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
        Schema::dropIfExists('product_print_sizes');
    }
};
