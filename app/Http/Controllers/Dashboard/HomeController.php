<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillModel;
use App\Models\BillDetailModel;
use DB;

class HomeController extends Controller
{
    public function index()
    {
    	return view('layouts.index');
    }

    public function statistical(Request $request)
    {
    	$data = $request->except('_token');
    	$data['startTime'] = $data['startTime'].' 00:00:00';
    	$data['endTime'] = $data['endTime'].' 23:59:59';
    	$billDetail = BillDetailModel::whereBetween('created_at', array($data['startTime'], $data['endTime']))
    			->get()->toArray();
    	$billMap = [];
    	foreach ($billDetail as $key => &$value) {
    		$value['date'] = date("d-m-yy",strtotime($value['created_at']));
    	}
    	$billDetail = collect($billDetail)->groupBy('date');
    	$statistical = [];
    	foreach ($billDetail as $key => $value) {
    		$countBill = $value->groupBy('bill_id');
    		$data = [];
			$data['date'] = $key;
			$data['countBill'] = count($countBill);
			$total = 0;
			foreach ($value as $item) {
				$total = $total + $item['price']*$item['amount'];
			}
			$data['total'] = $total;
			array_push($statistical, $data);
    	}

    	$viewData = [
    		'statistical' => $statistical
    	];
    	return view('layouts.index', $viewData);
    }
}
