<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = "supplier";
    protected $fillable = [
    	'id',
    	'supplier_code',
    	'name'
    ];
}
