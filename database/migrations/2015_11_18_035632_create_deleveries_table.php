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
            $table->increments('id');
            $table->string('invoice');
            $table->date('date_trans');
            $table->date('date_sent');
            $table->enum('status', ['Accepted', 'Rejected']);
            $table->string('username');
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
