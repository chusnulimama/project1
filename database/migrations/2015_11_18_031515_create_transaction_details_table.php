<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function(Blueprint $table){
            $table->engine="InnoDB";
            $table->increments('id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('book_id');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('disc');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_details');
    }
}
