<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('store_id')->unsigned();
            $table->integer('marketplace_id')->unsigned();
            $table->decimal('amount', 12, 4)->default(0);
            $table->integer('count')->deafult(0);

            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');

            $table->foreign('marketplace_id')
                ->references('id')->on('marketplaces')
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
        Schema::dropIfExists('order_statistics');
    }
}
