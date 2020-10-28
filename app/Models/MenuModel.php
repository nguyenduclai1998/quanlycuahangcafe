<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = "menu";
    protected $fillable = [
    	'id',
    	'drinks_code',
    	'name',
    	'price',
    	'unit',
    	'status'
    ];
}
