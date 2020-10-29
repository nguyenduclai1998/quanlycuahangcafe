<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\TableModel;

class TableManagerController extends Controller
{
    public function getTable() {
    	$table = TableModel::get();
    	$viewData = [
    		'table' => $table
    	];
    	return view('dashboard.table.index', $viewData);
    }

    public function createTable(Request $request) {
    	$data = $request->except('_token');

    	foreach ($data as $key => &$value) {
            $data['table_code'] = Str::slug($request->table_code) ;
        }
    	$message = [
    		"table_code.unique" => "Table Code đã tồn tại",
    		"table_code.required" => "Table code không được bỏ trống",
    		"number.required" => "Số bàn không được bỏ trống.",
    		"number.integer" => "Số bàn phải là số nguyên dương.",
    		"number.min" => "Số bàn phải là số nguyên dương.",
    		"status.required" => "Trạng thái không được bỏ trống."
    	];

    	$validator = Validator::make($data, [
    		'table_code' => 'required|unique:table',
    		'number' => 'required|integer|min:0',
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
    		$table = new TableModel();
    		$table->table_code = Str::slug($request->table_code);
    		$table->number = $request->number;
    		$table->status = $request->status;
    		$table->save();
    		toastr()->success('Thêm mới thành công.');
    		return redirect()->back();
    	}
    }

    public function updateTable(Request $request, $idTable) {
    	$data = $request->except('_token');
    	$message = [
    		"number.required" => "Số bàn không được bỏ trống.",
    		"number.integer" => "Số bàn phải là số nguyên dương.",
    		"number.min" => "Số bàn phải là số nguyên dương.",
    		"status.required" => "Trạng thái không được bỏ trống."
    	];

    	$validator = Validator::make($data, [
    		'number' => 'required|integer|min:1',
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
    		$table = new TableModel();
    		$table = TableModel::find($idTable);

    	}
    }

    public function deleteTable($idTable) {
    	$table = TableModel::find($idTable);
    	if($table) {
    		$table->delete();
    		toastr()->success("Xóa thành công.");
    		return redirect()->back();
    	} else {
    		toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
    		return redirect()->back();
    	}
    }
}
