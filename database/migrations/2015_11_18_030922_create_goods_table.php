<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function(Blueprint $table){
            $table->increments('id');
            $table->string('id_good');
            $table->string('name');
            $table->string('author');
            $table->string('publisher');
            $table->string('supplier');
            $table->integer('stock');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
