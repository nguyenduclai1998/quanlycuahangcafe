<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    protected $table = "bill";
    protected $fillable = [
    	'id',
    	'bill_code',
    	'user_id',
    	'table_id',
    	'bill_date',
    	'bartender',
    	'status',
        'number'
    ];
}
