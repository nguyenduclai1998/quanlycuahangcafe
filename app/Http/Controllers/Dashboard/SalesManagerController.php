<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesManagerController extends Controller
{
    public function getBillOfSale() {
    	return view('dashboard.billofsale.index');
    }

    // public function post
}
