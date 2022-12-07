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
        Schema::create('order_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('laundry_item_id')->unsigned();
            $table->integer('laundry_service_id')->unsigned();
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->foreign('laundry_item_id')
                ->references('id')
                ->on('laundry_items')
                ->onDelete('cascade');

            $table->foreign('laundry_service_id')
                ->references('id')
                ->on('laundry_services')
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
        Schema::dropIfExists('order_lists');
    }
};
