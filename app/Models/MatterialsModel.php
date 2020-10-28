<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatterialsModel extends Model
{
    protected $table = "matterials";
    protected $fillable = [
    	'id',
    	'matterials_code',
    	'name',
    	'unit'
    ];
}
