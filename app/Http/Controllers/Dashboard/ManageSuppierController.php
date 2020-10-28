<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\SupplierModel;

class ManageSuppierController extends Controller
{
    public function getSupplier() {
    	$supplier = SupplierModel::get();

    	$viewData = [
    		'supplier' => $supplier
    	];

    	return view('dashboard.supplier.index', $viewData);
    }

    public function createSupplier(Request $request) {
    	$data = $request->except('_token');
    	foreach ($data as $key => $value) {
    		$data['supplier_code'] = Str::slug($request->supplier_code);
    	}

    	$messages = [
    		'supplier_code.required' => "Mã nhà cung cấp không được để trống.",
    		'supplier_code.unique' => "Mã nhà cung cấp đã tồn tại",
    		'name.required' => "Tên nhà cung cấp không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'supplier_code' => 'required|unique:supplier',
    		'name' => 'required'
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
    		$supplier = new SupplierModel();
    		$supplier->supplier_code = Str::slug($request->supplier_code);
    		$supplier->name = $request->name;
    		$supplier->save();
    		toastr()->success("Thêm mới thành công");
    		return redirect()->back();    		
    	}
    }

    public function updateSupplier(Request $request, $idSupplier) {
    	$data = $request->except('_token');
    	$messages = [
    		'name.required' => "Tên nhà cung cấp không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'name' => 'required'
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
    		$supplier = new SupplierModel();
    		$supplier = SupplierModel::find($idSupplier);
    		$supplier->name = $request->name;
    		$supplier->update();
    		toastr()->success("Cập nhật thành công");
    		return redirect()->back();    		
    	}
    }

    public function deleteSupplier($idSupplier) {
    	$supplier = SupplierModel::find($idSupplier);
    	if($supplier) {
    		$supplier->delete();
    		toastr()->success("Xóa thành công");
    		return redirect()->back();
    	} else {
    		toastr()->error("Đã có lỗi xảy ra vui lòng thử lại.");
    		return redirect()->back();
    	}
    }
}

