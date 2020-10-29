<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\GoodsDeliveryNoteDetailModel;
use App\Models\GoodsDeliveryNoteModel;
use App\Models\SupplierModel;
use App\User;

class GoodDeliveryNoteController extends Controller
{
    public function getGoodDeliveryNote() {
    	$goodDeliveryNote = GoodsDeliveryNoteModel::join("goodsdeliverynotedetail", "goods_delivery_note.id", "=", "goodsdeliverynotedetail.required_import_goods_id")->get();
    	$supplier = SupplierModel::get();
    	$viewData = [
    		'goodDeliveryNote' => $goodDeliveryNote,
    		'supplier' => $supplier
    	];

    	return view('dashboard.gooddeliverynote.index', $viewData);
    }
}
