<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableModel;
use App\Models\BillModel;
use App\Models\BillDetailModel;

class ServeDinksController extends Controller
{
    public function getBill() 
    {
    	$bill = BillModel::select('bill.id', 'bill.bill_code', 'bill.bill_date', 'bill.status', 'users.name', 'table.number')
    		               ->join('users', 'bill.user_id', '=', 'users.id')
    		               ->join('table', 'bill.table_id', '=', 'table.id')
    		               ->get();
    	$viewData = [
    		'bill' => $bill
    	];
    	return view('dashboard.servedrinks.index', $viewData);
    }

    public function updateStatus(Request $request) 
    {
    	$bill = new BillModel();
	    $bill = BillModel::find($request->id);
    	$bill->status = $request->status;
    	$bill->bartender = $request->status == 2 ? \Auth::user()->name : '';
    	$bill->update();
    	toastr()->success("Cập nhật thành công.");
    	if($request->status == 1)  {
    		return redirect()->back();
    	}
    	return redirect()->route('getDetail.billofsale', ['id' => $request->id]);
    }
}
