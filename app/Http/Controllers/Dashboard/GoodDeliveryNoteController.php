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
use App\Models\MatterialsModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GoodDeliveryNoteController extends Controller
{
    public function getGoodDeliveryNote() {
    	$goodDeliveryNote = GoodsDeliveryNoteModel::select('goods_delivery_note.id','goods_delivery_note.goods_delivery_note_code', 'goods_delivery_note.supplier_id', 'goods_delivery_note.deliver','goods_delivery_note.issue_date', 'goods_delivery_note.deliver_phone_number', 'supplier.name', 'users.name as staffIsName')
    	->join("supplier", "goods_delivery_note.supplier_id", "=", "supplier.id")
    	->join("users","goods_delivery_note.user_id", "=", "users.id")
    	->get();

    	$supplier = SupplierModel::get();
    	$viewData = [
    		'goodDeliveryNote' => $goodDeliveryNote,
    		'supplier' => $supplier,
    	];

    	return view('dashboard.gooddeliverynote.index', $viewData);
    }

    public function createGoodDeliveryNote(Request $request) {
    	$data = $request->except('_token');
    	foreach ($data as $key => $value) {
    		$data['goods_delivery_note_code'] = Str::slug($request->goods_delivery_note_code);
    	}
    	
    	$messages = [
    		'goods_delivery_note_code.required' => "Mã phiếu nhập kho không được để trống",
    		'goods_delivery_note_code.unique' => "Mã phiếu nhập kho đã tồn tại.",
    		'supplier_id.required' => "Nhà cung cấp không được để trống",
    		'deliver.required' => "Nhân viên giao hàng không được để trống",
    		'deliver_phone_number.required' => "Số điện thoại nhân viên giao hàng không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'goods_delivery_note_code' => 'required|unique:goods_delivery_note',
    		'supplier_id' => 'required',
    		'deliver' => 'required',
    		'deliver_phone_number' => 'required',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		$errors = $errors->toArray();
    		foreach ($errors as $value) {
    			foreach ($value as $element) {
    				toastr()->error($element);
    			}
    		}
    		return redirect()->back();
    	} else {
    		$goodDeliveryNote = new GoodsDeliveryNoteModel();
    		$goodDeliveryNote->goods_delivery_note_code = Str::slug($request->goods_delivery_note_code);
    		$goodDeliveryNote->supplier_id = $request->supplier_id;
    		$goodDeliveryNote->deliver = $request->deliver;
    		$goodDeliveryNote->user_id = Auth::id();
    		$goodDeliveryNote->issue_date = Carbon::now()->toDateTimeString();
    		$goodDeliveryNote->deliver_phone_number = $request->deliver_phone_number;
    		$goodDeliveryNote->save();

    		$goodDeliveryNoteDetail = new GoodsDeliveryNoteDetailModel();
    		$goodDeliveryNoteDetail->required_import_goods_id = $goodDeliveryNote->id;
    		$goodDeliveryNoteDetail->save();
    		toastr()->success("Thêm mới thành công.");
    		return redirect()->back();
    	}
    }

    public function updateGoodDeliveryNote(Request $request, $goodDeliveryNoteId) {
    	$data = $request->except('_token');

    	$messages = [
    		'supplier_id.required' => "Nhà cung cấp không được để trống",
    		'deliver.required' => "Nhân viên giao hàng không được để trống",
    		'deliver_phone_number.required' => "Số điện thoại nhân viên giao hàng không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'supplier_id' => 'required',
    		'deliver' => 'required',
    		'deliver_phone_number' => 'required',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		$errors = $errors->toArray();
    		foreach ($errors as $value) {
    			foreach ($value as $element) {
    				toastr()->error($element);
    			}
    		}
    		return redirect()->back();
    	} else {
    		$goodDeliveryNote = new GoodsDeliveryNoteModel();
    		$goodDeliveryNote = GoodsDeliveryNoteModel::find($goodDeliveryNoteId);
    		$goodDeliveryNote->supplier_id = $request->supplier_id;
    		$goodDeliveryNote->deliver = $request->deliver;
    		$goodDeliveryNote->deliver_phone_number = $request->deliver_phone_number;
    		$goodDeliveryNote->update();
    		toastr()->success("Cập nhật thành công.");
    		return redirect()->back();
    	}
    }

    public function deleteGoodDeliveryNote($goodDeliveryNoteId) {
    	$goodDeliveryNote = GoodsDeliveryNoteModel::find($goodDeliveryNoteId);
    	if($goodDeliveryNote) {
    		$goodDeliveryNote->delete();
    		toastr()->success("Xóa thành công.");
    		return redirect()->back();
    	}else {
    		toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
    		return redirect()->back();
    	}
    }

    public function getDetail($goodDeliveryNoteId) {
    	$goodDeliveryNoteDetail = GoodsDeliveryNoteDetailModel::select('goods_delivery_note.goods_delivery_note_code', 'goodsdeliverynotedetail.matterials_id', 'goodsdeliverynotedetail.required_import_goods_id', 'goodsdeliverynotedetail.amount', 'matterials.name')
    	->join('goods_delivery_note', 'goods_delivery_note.id', '=', 'goodsdeliverynotedetail.required_import_goods_id')
    	->leftjoin('matterials', 'matterials.id', '=', 'goodsdeliverynotedetail.matterials_id')
    	->where('goodsdeliverynotedetail.required_import_goods_id', '=', $goodDeliveryNoteId)
    	->get();
    	$matterial = MatterialsModel::get();
    	$viewData = [
    		'goodDeliveryNoteDetail' => $goodDeliveryNoteDetail,
    		'matterial' => $matterial
    	];

    	return view('dashboard.gooddeliverynote.detail', $viewData);
    }

    public function createDetail(Request $request, $requiredImportGoodsId) {
    	$data = $request->except('_token');

    	$messages = [
    		'matterials_id.required' => "Hàng hóa không được để trống",
    		'amount.required' => "Số lượng không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'matterials_id' => 'required',
    		'amount' => 'required',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		$errors = $errors->toArray();
    		foreach ($errors as $value) {
    			foreach ($value as $element) {
    				toastr()->error($element);
    			}
    		}
    		return redirect()->back();
    	} else {
    		$goodDeliveryNoteDetail = new GoodsDeliveryNoteDetailModel();
    		$goodDeliveryNoteDetail->required_import_goods_id = $requiredImportGoodsId;
    		$goodDeliveryNoteDetail->matterials_id = $request->matterials_id;
    		$goodDeliveryNoteDetail->amount = $request->amount;
    		dd($goodDeliveryNoteDetail);
    		$goodDeliveryNoteDetail->save();
    		toastr()->success("Thêm mới thành công.");
    		return redirect()->back();
    	}
    }
}
