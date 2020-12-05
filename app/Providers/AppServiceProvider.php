<?php

namespace App\Providers;
use App\Models\BillModel;
use App\Models\BillDetailModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MenuModel;
use App\Models\MatterialsModel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $allBillDetail = BillDetailModel::get();
        $totalMoney = 0;
        foreach ($allBillDetail as $key => $value) {
            $totalMoney = $totalMoney + $value['price']*$value['amount'];
        } 

        $dish = MenuModel::where('is_active', 1)->get()->toArray();
        $totalDish = count($dish);

        $bill = BillModel::get()->toArray();
        $totalBill = count($bill);

        $startDate = date("Y-m-d").' 00:00:00';
        $endDate = date("Y-m-d").' 23:59:59';
        $billDetailToday = BillDetailModel::whereBetween('created_at', array($startDate, $endDate))
                ->get()->toArray();

        $statisticalToday = 0;
        foreach ($billDetailToday as $key => $value) {
            $statisticalToday = $statisticalToday + $value['price']*$value['amount'];
        }
        View::share('totalMoney', $totalMoney);
        View::share('totalDish', $totalDish);
        View::share('totalBill', $totalBill);
        View::share('statisticalToday', $statisticalToday);
    }
}
