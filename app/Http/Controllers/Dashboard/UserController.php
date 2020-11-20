<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers() {
    	$users = User::get();
    	$viewData = [
    		'users' => $users
    	];

    	return view('dashboard.users.index', $viewData);
    }

    public function createUser(Request $request) {
    	$data = $request->except('_token');
    	foreach ($data as $key => &$value) {
    		$data['user_code'] = strtoupper(Str::slug($request->user_code));
    	}

    	$messages = [
    		'user_code.required' => "Mã nhân viên không được bỏ trống.",
    		'user_code.unique' => "Mã nhân viên đã tồn tại.",
    		'email.required' => "Email không được để trống.",
    		'email.email' => "Email không đúng định dạng.",
    		'email.unique' => "Email đã tồn tại tại.",
    		'status.required' => "Trạng thái không được để trống.",
    		'name.required' => "Họ tên không được để trống.",
    		'id_card.required' => "Số CMND không được để trống.",
            'id_card.unique' => "Số CMND đã tồn tại.",
    		'gender.required' => "Giới tính không được để trống.",
    		'role_id.required' => "Vị trí làm việc không được để trống.",
    		'password.required' => "Mật khẩu không được để trống.",
    		'password.min' => "Mật khẩu tối thiểu 8 kí tự."
    	];

    	$validator = Validator::make($data, [
    		'user_code' => 'required|unique:users',
    		'email' => 'required|email|unique:users',
    		'status' => 'required',
    		'name' => 'required',
    		'id_card' => 'required|unique:users',
    		'gender' => 'required',
    		'role_id' => 'required',
    		'password' => 'required|min:8'
    	], $messages);

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
            try {
                $user = new User();
                $user->user_code = strtoupper(Str::slug($request->user_code));
                $user->name = $request->name;
                $user->email  = $request->email;
                $user->id_card = $request->id_card;
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
                $user->role_id = $request->role_id;
                $user->status = $request->status;
                $user->save();
                toastr()->success("Thêm mới thành công.");
                return redirect()->back();
            } catch (Exception $e) {
                toastr()->error("Đã xảy ra lỗi vui lòng thử lại.");
                return redirect()->back();
            }
    	}
    }

    public function updateUser(Request $request, $idUser) {
    	$data = $request->except('_token');
    	$message = [
    		'status.required' => "Trạng thái không được để trống.",
    		'name.required' => "Họ tên không được để trống.",
    		'id_card.required' => "Số CMND không được để trống.",
    		'gender.required' => "Giới tính không được để trống.",
    		'role_id.required' => "Vị trí làm việc không được để trống.",
    	];

    	$validator = Validator::make($data, [
    		'status' => 'required',
    		'name' => 'required',
    		'id_card' => 'required',
    		'gender' => 'required',
    		'role_id' => 'required',
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
    		$user = new User();
    		$user = User::find($idUser);
    		$user->name = $request->name;
    		$user->id_card = $request->id_card;
    		$user->gender = $request->gender;
    		$user->role_id = $request->role_id;
    		$user->status = $request->status;
    		$user->update();
    		toastr()->success("Cập nhật thành công.");
    		return redirect()->back();
    	}
    }
}
