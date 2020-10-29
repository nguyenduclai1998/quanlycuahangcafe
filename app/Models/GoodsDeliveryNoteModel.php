<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsDeliveryNoteModel extends Model
{
    protected $table = "goods_delivery_note";
    protected $fillable = [
    	'id',
    	'goods_delivery_note_code',
    	'user_id',
    	'supplier_id',
    	'issue_date',
    	'deliver',
    	'deliver_phone_number'
    ];
}