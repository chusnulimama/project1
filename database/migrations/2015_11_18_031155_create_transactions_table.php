<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table){
            $table ->increments('id');
            $table->string('invoice');
            $table->date('date_trans');
            $table->string('id_trans');
            $table->string('username');
            $table->integer('total');
            $table->integer('payment');
            $table->string('status');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
