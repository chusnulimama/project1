<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function(Blueprint $table){
            $table->engine="InnoDB";
            $table->increments('delivery_id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('person_in_charge');
            $table->date('date_sent');
            $table->enum('status', ['Accepted', 'Pending', 'Rejected']);
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('person_in_charge')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deliveries');
    }
}
