<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('CartItemID');

            $table->integer('ShoppingCartID')->unsigned();
            $table->foreign('ShoppingCartID')->references('ShoppingCartID')->on('shoppingcarts');

            $table->integer('ProductID')->unsigned();
            $table->foreign('ProductID')->references('ProductID')->on('products');

            $table->float('quantity');
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
        Schema::dropIfExists('cart_items');
    }
}
