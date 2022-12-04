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
        Schema::create('laundry_images', function (Blueprint $table) {
            $table->id();
            $table->integer('toko_id')->unsigned();
            $table->string('image');
            $table->timestamps();

            $table->foreign('toko_id')
                    ->references('id')
                    ->on('tokos')
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
        Schema::dropIfExists('laundry_images');
    }
};
