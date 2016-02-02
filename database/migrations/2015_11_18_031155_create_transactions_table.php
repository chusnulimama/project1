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
            $table->engine="InnoDB";
            $table ->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('transaction_id');
            $table->date('date_trans');
            $table->integer('total');
            $table->enum('payment', ['Cash','Consolidation', 'Consignment']);
            $table->enum('type', ['Receive', 'Sale']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
