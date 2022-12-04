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
        Schema::create('laundry_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('toko_id')->unsigned();
            $table->integer('item_type_id')->unsigned();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('toko_id')
                ->references('id')
                ->on('tokos')
                ->onDelete('cascade');

            $table->foreign('item_type_id')
                ->references('id')
                ->on('item_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry_items');
    }
};
