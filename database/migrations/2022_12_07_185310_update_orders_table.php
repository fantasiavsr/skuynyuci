<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE orders MODIFY COLUMN `status` ENUM(\'Draft\', \'Waitting for Payment\', \'Pending\', \'Ongoing\', \'Comlpeted\') NOT NULL');
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('order_type', ['Self service', 'Delivery service']);
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE orders MODIFY COLUMN `status` String NOT NULL');
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_type');
            $table->dropColumn('address');
        });
    }
};
