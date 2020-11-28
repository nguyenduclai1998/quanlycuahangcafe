<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\MenuModel;

class MenuManagerController extends Controller
{
    public function getMenu() {
    	$menu = MenuModel::get();
        $menuArr = [];
        foreach ($menu as $value) {
            if($value['is_active'] == 1) {
                array_push($menuArr, $value);
            }
        }
    	$viewData = [
    		'menu' => $menuArr
    	];
    	return view('dashboard.menu.index', $viewData);
    }

    public function createMenu(Request $request) {
    	$data = $request->except('_token');
    	foreach ($data as $key => &$value) {
            $data['drinks_code'] = strtoupper(Str::slug($request->drinks_code)) ;
        }
    	$message = [
    		"drinks_code.unique" => "Drink Code đã tồn tại",
    		"drinks_code.required" => "Drink code không được bỏ trống",
    		"name.required" => "Tên đồ uống không được bỏ trống.",
    		"price.required" => "Giá tiền không được bỏ trống.",
    		"price.integer" => "Giá tiền phải là số nguyên dương.",
    		"price.min" => "Giá tiền phải là số nguyên dương.",
    		"unit.required" => "Đơn vị tính không được bỏ trống.",
    		"status.required" => "Trạng thái không được bỏ trống."
    	];

    	$validator = Validator::make($data, [
    		'drinks_code' => 'required|unique:menu',
    		'name' => 'required',
    		'price' => 'required|integer|min:0',
    		'unit' => 'required',
    		'status' => 'required'
    	], $message);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		$errors = $errors->toArray();
    		foreach ($errors as $value) {
    			foreach ($value as $elemnt) {
    				toastr()->error($elemnt);
    			}
	        }
    		return redirect()->back();
    	} else {
    		$menu = new MenuModel();
    		$menu->drinks_code = strtoupper(Str::slug($request->drinks_code));
    		$menu->name = $request->name;
    		$menu->price = $request->price;
    		$menu->unit = $request->unit;
    		$menu->status = $request->status;
    		$menu->save();

    		toastr()->success('Thêm mới thành công.');
    		return redirect()->back();
    	}
    }

    public function updateMenu(Request $request, $idmMenu) {
    	$data = $request->except('_token');
    	$message = [
    		"name.required" => "Tên đồ uống không được bỏ trống.",
    		"price.required" => "Giá tiền không được bỏ trống.",
    		"price.integer" => "Giá tiền phải là số nguyên dương.",
    		"price.min" => "Giá tiền phải là số nguyên dương.",
    		"unit.required" => "Đơn vị tính không được bỏ trống.",
    		"status.required" => "Trạng thái không được bỏ trống."
    	];

    	$validator = Validator::make($data, [
    		'name' => 'required',
    		'price' => 'required|integer|min:0',
    		'unit' => 'required',
    		'status' => 'required'
    	], $message);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		$errors = $errors->toArray();
    		foreach ($errors as $value) {
    			foreach ($value as $elemnt) {
    				toastr()->error($elemnt);
    			}
	        }
    		return redirect()->back();
    	} else {
    		$menu = new MenuModel();
    		$menu = MenuModel::find($idmMenu);
    		$menu->name = $request->name;
    		$menu->price = $request->price;
    		$menu->unit = $request->unit;
    		$menu->status = $request->status;
    		$menu->update();

    		toastr()->success('Cập nhật thành công.');
    		return redirect()->back();
    	}

    }

    public function deleteMenu($idmMenu) {
        $menu = new MenuModel();
        $menu = MenuModel::find($idmMenu);
        $menu->is_active = 0;
        $menu->update();

        toastr()->success('Xóa thành công.');
        return redirect()->back();
    }
}
