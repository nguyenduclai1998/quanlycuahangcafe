<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\TableModel;
use App\Models\BillModel;
use App\Models\BillDetailModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SalesManagerController extends Controller
{
    public function getBillOfSale() {
    	$bill = BillModel::select('bill.id', 'bill.bill_code', 'bill.bill_date', 'bill.status', 'users.name', 'table.number')
    		               ->join('users', 'bill.user_id', '=', 'users.id')
    		               ->join('table', 'bill.table_id', '=', 'table.id')
    		               ->get();
    	$viewData = [
    		'bill' => $bill
    	];
    	return view('dashboard.billofsale.index', $viewData);
    }

    public function createBillOfSale() {
    	$menu = MenuModel::where('status', 0)->get();
    	$table = TableModel::where('status', 0)->get();

    	$viewData = [
    		'menu' => $menu,
    		'table' => $table
    	];
    	return view('dashboard.billofsale.create', $viewData);
    }

    public function storeBillOfSale(Request $request) {
    	$data = $request->except('_token');
        
    	if(array_key_exists('productId', $data)) {
            $productId = $data['productId'];
            $unit = $data['unit'];
            $price = $data['price'];
            $arrayItem = [];
            $size = count($productId);
            for($i = 0; $i < $size; ++$i) {
                $arrayItem[$i] = [$productId[$i], $unit[$i], $price[$i]];
               
            }

	    	$messages = [
	    		'table_id.required' => "Bàn không được để trống",
	    		'productId.*.required' => "Món ăn không được để trống",
	    		'unit.*.required' => "Số lượng không được để trống",
	    		'unit.*.numeric' => "Số lượng phải là một số.",
	    		'unit.*.min' => "Số lượng nhỏ nhất là 1."
	    	];
	    	$validator = Validator::make($data, [
	    		'table_id' => 'required',
	    		'unit.*' => 'required|numeric|min:1',
	            'productId.*' => 'required'
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
	    		try {
                    $original_date = Carbon::now()->toDateTimeString();
                    $timestamp = strtotime($original_date);
                    $bill_date = date('H:i:s Y-m-d', $timestamp);
	    			$bill = new BillModel();
	    			$number = BillModel::max('number') + 1;
		    		$bill->bill_code = "HD-".str_pad($number, 5, "0", STR_PAD_LEFT);
		    		$bill->user_id = Auth::id();
		    		$bill->table_id = $request->table_id;
                    $bill->status = 1;
		    		$bill->bill_date = $bill_date;
		    		$bill->number = BillModel::max('number') + 1;
		    		$bill->save();

		    		foreach ($arrayItem as  $value) {
		                $billDetail = new BillDetailModel();
			    		$billDetail->bill_id = $bill->id;
			    		$billDetail->menu_id = (int)$value[0];
			    		$billDetail->amount = (int)$value[1];
                        $billDetail->price = (int)$value[2];
			    		$billDetail->save();
		            }
		    		
		    		toastr()->success("Thêm mới thành công.");
		    		return redirect()->route('getDetail.billofsale', ['id' => $bill->id]);
	    		} catch (\Exception $e) {
	    			toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
	    			return redirect()->back();
	    		}
			}
    	} else {
    		toastr()->error("Vui lòng chọn món.");
    		return redirect()->back();
    	}
    }

    public function editBillOfSale($id) 
    {
    	$bill = BillModel::select('bill.id as billId','table.id','table.number')
    					   ->join('table', 'bill.table_id', '=', 'table.id')
    					   ->where('bill.id', $id)
    					   ->first();
    	$billDetail = new BillDetailModel();
    	$menu = MenuModel::where('status', 0)->get();
    	$table = TableModel::where('status', 0)->get();
    	$billDetail = BillDetailModel::select('menu.id','menu.name', 'billdetail.menu_id', 'billdetail.amount', 'menu.price')
    								   ->join('menu', 'billdetail.menu_id', '=', 'menu.id')
    								   ->where('billdetail.bill_id',$id)->get();
    	$viewData = [
    		'menu' => $menu,
    		'table' => $table,
    		'bill' => $bill,
    		'billDetail' => $billDetail
    	];
    	return view('dashboard.billofsale.update', $viewData);
    }

    public function updateBillOfSale(Request $request, $id) 
    {
    	$data = $request->except('_token');
        
    	$productId = $data['productId'];
        $unit = $data['unit'];
        $price = $data['price'];
        $arrayItem = [];
        $size = count($productId);
        for($i = 0; $i < $size; ++$i) {
            $arrayItem[$i] = [$productId[$i], $unit[$i], $price[$i]];
           
        }
    	$messages = [
    		'table_id.required' => "Bàn không được để trống",
    		'productId.*.required' => "Món ăn không được để trống",
    		'unit.*.required' => "Số lượng không được để trống",
    		'unit.*.numeric' => "Số lượng phải là một số.",
    		'unit.*.min' => "Số lượng nhỏ nhất là 1."
    	];
    	$validator = Validator::make($data, [
    		'table_id' => 'required',
    		'unit.*' => 'required|numeric|min:1',
            'productId.*' => 'required'
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
    		try {
    			$billDetailDelete = BillDetailModel::where('billdetail.bill_id', $id)->delete();
	    		$bill = new BillModel();
	    		$bill = BillModel::find($id);
	    		$bill->table_id = $request->table_id;
	    		$bill->update();

	    		foreach ($arrayItem as  $value) {
                    $billDetail = new BillDetailModel();
                    $billDetail->bill_id = $bill->id;
                    $billDetail->menu_id = (int)$value[0];
                    $billDetail->amount = (int)$value[1];
                    $billDetail->price = (int)$value[2];
                    $billDetail->save();
                }
	    		
	    		toastr()->success("Cập nhật thành công.");
	    		return redirect()->route('getDetail.billofsale', ['id' => $bill->id]);
    		} catch (\Exception $e) {
    			toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
    			return redirect()->back();
    		}
    	}
    }

    public function deleteBillOfSale($id) {
    	try {
    		$bill = BillModel::find($id)->delete();
    		$billDetail = BillDetailModel::where('billdetail.bill_id', $id)->delete();
    		toastr()->success("Xóa thành công.");
    		return redirect()->back();
    	} catch (\Exception $e) {
    		toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
    		return redirect()->back();
    	}
    	
    }

    public function getBillDetal($id) 
    {
    	$bill = new BillModel();
		$bill = BillModel::select('bill.id as billId', 'bill.bill_code', 'bill.bill_date', 'bill.bartender', 'bill.status', 'users.name', 'bill.user_id', 'bill.table_id', 'table.number')
						  ->join('users', 'bill.user_id', '=', 'users.id')
						  ->join('table', 'bill.table_id', '=', 'table.id')
                          ->where('bill.id', $id)
						  ->first();
		$billDetail = BillDetailModel::select('billdetail.menu_id','billdetail.amount', 'billdetail.price', 'menu.name', 'billdetail.price')
									 ->join('menu', 'billdetail.menu_id', '=', 'menu.id')
									 ->where('billdetail.bill_id', $id)->get();
	    // dd($billDetail);
        $viewData = [
			'bill' => $bill,
			'billDetail' => $billDetail
		];

		return view('dashboard.billofsale.detail', $viewData);
    }
}
