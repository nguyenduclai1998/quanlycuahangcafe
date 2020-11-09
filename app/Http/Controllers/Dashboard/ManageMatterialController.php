<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\MatterialsModel;

class ManageMatterialController extends Controller
{
    public function getMatterial() {
    	$matterial = MatterialsModel::get();

    	$viewData = [
    		'matterial' => $matterial
    	];

    	return view('dashboard.matterial.index', $viewData);
    }

    public function createMatterial(Request $request) {
    	$data = $request->except('_token');
    	foreach ($data as $key => $value) {
    		$data['matterials_code'] = strtoupper(Str::slug($request->matterials_code));
    	}

    	$messages = [
    		'matterials_code.required' => "Mã hàng hóa không được để trống.",
    		'matterials_code.unique' => "Mã hàng hóa đã tồn tại",
    		'name.required' => "Tên hàng hóa không được để trống",
    		'unit.required' => "Đơn vị tính không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'matterials_code' => 'required|unique:matterials',
    		'name' => 'required',
    		'unit' => 'required',
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
    		$matterial = new MatterialsModel();
    		$matterial->matterials_code = strtoupper(Str::slug($request->matterials_code));
    		$matterial->name = $request->name;
    		$matterial->unit = $request->unit;
    		$matterial->save();
    		toastr()->success("Thêm mới thành công.");
    		return redirect()->back();
    	}
    }

    public function updateMatterial(Request $request, $idMatterial) {
    	$data = $request->except('_token');

    	$messages = [
    		'name.required' => "Tên hàng hóa không được để trống",
    		'unit.required' => "Đơn vị tính không được để trống"
    	];
    	$validator = Validator::make($data, [
    		'name' => 'required',
    		'unit' => 'required',
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
    		$matterial = new MatterialsModel();
    		$matterial = MatterialsModel::find($idMatterial);
    		$matterial->name = $request->name;
    		$matterial->unit = $request->unit;
    		$matterial->update();
    		toastr()->success("Cập nhật thành công.");
    		return redirect()->back();
    	}
    }

    public function deleteMatterial($idMatterial) {
    	$matterial = MatterialsModel::find($idMatterial);
    	if($matterial) {
    		$matterial->delete();
    		toastr()->success("Xóa thành công.");
    		return redirect()->back();
    	}else {
    		toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
    		return redirect()->back();
    	}
    }
}
