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
        $goodDeliveryNoteDetails = [];
        foreach ($goodDeliveryNote as $key => $value) {
            $goodDeliveryNoteDetail = GoodsDeliveryNoteDetailModel::select('goods_delivery_note.goods_delivery_note_code', 'goodsdeliverynotedetail.matterials_id', 'goodsdeliverynotedetail.required_import_goods_id', 'goodsdeliverynotedetail.amount', 'matterials.name', 'matterials.unit', 'supplier.name as supplierName')
            ->join('goods_delivery_note', 'goods_delivery_note.id', '=', 'goodsdeliverynotedetail.required_import_goods_id')
            ->join("supplier", "goods_delivery_note.supplier_id", "=", "supplier.id")
            ->leftjoin('matterials', 'matterials.id', '=', 'goodsdeliverynotedetail.matterials_id')
            ->where('goodsdeliverynotedetail.required_import_goods_id', '=', $value['id'])
            ->get();
            $goodDeliveryNoteDetails[$value['id']][] = $goodDeliveryNoteDetail;
        }

    	$supplier = SupplierModel::get();
    	$matterial = MatterialsModel::get();
        $title = "Quản lý phiếu nhập kho";

    	$viewData = [
    		'goodDeliveryNote' => $goodDeliveryNote,
    		'supplier' => $supplier,
    		'matterial' => $matterial,
            'goodDeliveryNoteDetails' => $goodDeliveryNoteDetails,
    	];

    	return view('dashboard.gooddeliverynote.index', $viewData);
    }

    public function createGoodDeliveryNote(Request $request) {
    	$data = $request->except('_token');

        $array = array_combine($data['matterials_id'], $data['amount']);
    	foreach ($data as $key => $value) {
    		$data['goods_delivery_note_code'] = strtoupper(Str::slug($request->goods_delivery_note_code));
    	}
    	
    	$messages = [
    		'goods_delivery_note_code.required' => "Mã phiếu nhập kho không được để trống",
    		'goods_delivery_note_code.unique' => "Mã phiếu nhập kho đã tồn tại.",
    		'supplier_id.required' => "Nhà cung cấp không được để trống",
    		'deliver.required' => "Nhân viên giao hàng không được để trống",
    		'deliver_phone_number.required' => "Số điện thoại nhân viên giao hàng không được để trống",
            'matterials_id.*.required' => "Hàng hóa không được để trống",
            'amount.*.required' => "Số lượng không được để trống",
            'amount.*.numeric' => "Số lượng phải là số nguyên dương.",
            'amount.*.min' => "Số lượng nhỏ nhất phải là 1",
    	];
    	$validator = Validator::make($data, [
    		'goods_delivery_note_code' => 'required|unique:goods_delivery_note',
    		'supplier_id' => 'required',
    		'deliver' => 'required',
    		'deliver_phone_number' => 'required',
            'amount.*' => 'numeric|min:1'
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
            $original_date = Carbon::now()->toDateTimeString();
            $timestamp = strtotime($original_date);
            $issue_date = date('H:i:s Y-m-d', $timestamp);
    		$goodDeliveryNote = new GoodsDeliveryNoteModel();
    		$goodDeliveryNote->goods_delivery_note_code = strtoupper(Str::slug($request->goods_delivery_note_code));
    		$goodDeliveryNote->supplier_id = $request->supplier_id;
    		$goodDeliveryNote->deliver = $request->deliver;
    		$goodDeliveryNote->user_id = Auth::id();
    		$goodDeliveryNote->issue_date = $issue_date;
    		$goodDeliveryNote->deliver_phone_number = $request->deliver_phone_number;
    		$goodDeliveryNote->save();

            foreach ($array as $key => $value) {
                $goodDeliveryNoteDetail = new GoodsDeliveryNoteDetailModel();
                $goodDeliveryNoteDetail->required_import_goods_id = $goodDeliveryNote->id;
                $goodDeliveryNoteDetail->matterials_id = $key;
                $goodDeliveryNoteDetail->amount = $value;
                $goodDeliveryNoteDetail->save();
            }
    		toastr()->success("Thêm mới thành công.");
    		return redirect()->back();
    	}
    }

    public function updateGoodDeliveryNote(Request $request, $goodDeliveryNoteId) {
    	$data = $request->except('_token');

        $array = array_combine($data['matterials_id'], $data['amount']);
        foreach ($data as $key => $value) {
            $data['goods_delivery_note_code'] = Str::slug($request->goods_delivery_note_code);
        }
        $array = array_filter($array);
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
            $goodDeliveryNoteDetailDelete = \DB::table('goodsdeliverynotedetail')->where('goodsdeliverynotedetail.required_import_goods_id',$goodDeliveryNoteId)->delete();
    		$goodDeliveryNote = new GoodsDeliveryNoteModel();
    		$goodDeliveryNote = GoodsDeliveryNoteModel::find($goodDeliveryNoteId);
    		$goodDeliveryNote->supplier_id = $request->supplier_id;
    		$goodDeliveryNote->deliver = $request->deliver;
    		$goodDeliveryNote->deliver_phone_number = $request->deliver_phone_number;
    		$goodDeliveryNote->update();

            foreach ($array as $key => $value) {
                $goodDeliveryNoteDetail = new GoodsDeliveryNoteDetailModel();
                $goodDeliveryNoteDetail->required_import_goods_id = $goodDeliveryNote->id;
                $goodDeliveryNoteDetail->matterials_id = $key;
                $goodDeliveryNoteDetail->amount = $value;
                $goodDeliveryNoteDetail->save();
            }
    		toastr()->success("Cập nhật thành công.");
    		return redirect()->back();
    	}
    }

    public function deleteGoodDeliveryNote($goodDeliveryNoteId) {
    	$goodDeliveryNote = GoodsDeliveryNoteModel::find($goodDeliveryNoteId);
        $goodDeliveryNoteDetail = \DB::table('goodsdeliverynotedetail')->where('goodsdeliverynotedetail.required_import_goods_id',$goodDeliveryNoteId)->delete();
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
        $goodDeliveryNote = GoodsDeliveryNoteModel::select('goods_delivery_note.id','goods_delivery_note.goods_delivery_note_code', 'goods_delivery_note.supplier_id', 'goods_delivery_note.deliver','goods_delivery_note.issue_date', 'goods_delivery_note.deliver_phone_number', 'supplier.name', 'users.name as staffIsName')
        ->join("supplier", "goods_delivery_note.supplier_id", "=", "supplier.id")
        ->join("users","goods_delivery_note.user_id", "=", "users.id")
        ->where('goods_delivery_note.id',$goodDeliveryNoteId)
        ->get();

    	$goodDeliveryNoteDetail = GoodsDeliveryNoteDetailModel::select('goods_delivery_note.goods_delivery_note_code', 'goodsdeliverynotedetail.matterials_id', 'goodsdeliverynotedetail.required_import_goods_id', 'goodsdeliverynotedetail.amount', 'matterials.name', 'matterials.unit', 'supplier.name as supplierName')
    	->join('goods_delivery_note', 'goods_delivery_note.id', '=', 'goodsdeliverynotedetail.required_import_goods_id')
        ->join("supplier", "goods_delivery_note.supplier_id", "=", "supplier.id")
    	->leftjoin('matterials', 'matterials.id', '=', 'goodsdeliverynotedetail.matterials_id')
    	->where('goodsdeliverynotedetail.required_import_goods_id', '=', $goodDeliveryNoteId)
    	->get();
    	$viewData = [
    		'goodDeliveryNoteDetail' => $goodDeliveryNoteDetail,
            'goodDeliveryNote' => $goodDeliveryNote
    	];

    	return view('dashboard.gooddeliverynote.detail', $viewData);
    }

}
