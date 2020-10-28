<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsDeliveryNoteDetailModel extends Model
{
    protected $table = "goodsdeliverynotedetail";
    protected $fillable = [
    	'id',
    	'matterials_id',
    	'required_import_goods_id',
    	'amount'
    ];
}
