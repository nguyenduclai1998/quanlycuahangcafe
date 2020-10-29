<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsdeliverynotedetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodsdeliverynotedetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matterials_id')->unsigned();
            $table->bigInteger('required_import_goods_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goodsdeliverynotedetail');
    }
}
