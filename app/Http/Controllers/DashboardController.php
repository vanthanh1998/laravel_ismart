<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;
use Charts;
use DB;
class DashboardController extends Controller
{
    public function get_admin(){
        $bill = Bill::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

        $chart = Charts::database($bill,'bar','highcharts')
                    ->title("Bill")
                    ->elementLabel("Total bill")
                    ->dimensions(1000,500)
                    ->responsive(true)
                    ->groupByMonth(date("Y"),true);
        return view('admin.dashboard.index',compact('chart'));
    }
}
