<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableModel extends Model
{
    protected $table = "table";
    protected $fillable = [
    	'id',
    	'table_code',
    	'number',
    	'status'
    ];
}
