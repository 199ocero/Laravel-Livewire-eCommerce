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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('title');
            $table->integer('price')->unsigned()->default(0);
            //color, size, weight
            $table->string('type');
            /*A SKU is a unique code consisting of letters and numbers
            that identify characteristics about each product,
            such as manufacturer, brand, style, color, and size.
            */
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('variations');
    }
};
