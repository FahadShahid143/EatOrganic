<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->string('ProductName');
            $table->text('ProductDesc');
            $table->string('ProductImage');

            $table->integer('CategoryID')->unsigned();
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');

            $table->integer('CompanyID')->unsigned();
            $table->foreign('CompanyID')->references('CompanyID')->on('companies');

            $table->float('Price');
            $table->float('Discount');
            $table->boolean('Availability');


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
        Schema::dropIfExists('products');
    }
}
