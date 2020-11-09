<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsDeliveryNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_delivery_note', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('goods_delivery_note_code')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->timestamp('issue_date',0);
            $table->string('deliver');
            $table->char('deliver_phone_number');
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
        Schema::dropIfExists('goods_delivery_note');
    }
}
