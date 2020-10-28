<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetailModel extends Model
{
    protected $table = "billdetail";
    protected $fillable = [
    	'id',
    	'bill_id',
    	'menu_id',
    	'amount'
    ]; 
}
