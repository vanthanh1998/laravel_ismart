<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;
use SUM;
use App\Product;
use DB;
use Yajra\DataTables\DataTables;

class BillController extends Controller
{
    public function get_list(){
    	return view('admin.bill.list');
    }
    public function getData(Request $request){
        if($request->ajax()){
            $bill  = Bill::latest()->where('status','!=',-1)->get();
            return DataTables::of($bill)
                ->addColumn('checkbox', function ($bill) {
                    return '<input type="checkbox" data-id="'.$bill->id.'" name="checkItem[]" class="delete_checkbox">';
                })
                ->addColumn('status', function ($bill) {
                    $status = $bill->status;
                    if($status == 0){
                        $a = '<a href="'.url('admin/bill/bill_detail/'.$bill->id).'"></a>';
                    }
                })
                ->addColumn('detail',function($bill){
                    $detail ='<a href="'.url('admin/bill/bill_detail/'.$bill->id).'" class="tbody-text btn btn-xs btn-show"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $detail;
                })
                ->rawColumns(['checkbox','status','detail'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function get_bill_detail($id){
    	$list = Bill_detail::select('*')->where('bill_id',$id)->get()->toArray();
    	$bill = Bill::select('*')->where('id',$id)->get()->toArray();
    	$total_qty = Bill_detail::select('*')->where('bill_id',$id)->sum('quality');
    	$total_price = Bill_detail::select('*')->where('bill_id',$id)->sum('sub_total');
        $check_print_bill = Bill::where('id',$id)->first();
    	return view('admin.bill.bill_detail',compact('list','bill','total_qty','total_price','check_print_bill'));
    }
    public function getdanhsachhuy($id){
        $bill = Bill::find($id);
        $bill->status= -1;
        $bill->save();
        return redirect('admin/bill/list')->with('success','Xác nhận vận chuyển thành công');
    }


    public function get_inhoadon($id){
        $bill= bill::select('*')->where('id',$id)->get();
        $bill_detail= bill_detail::where('bill_id',$id)->get();
        $total_price = Bill_detail::select('*')->where('bill_id',$id)->sum('sub_total');
        return view('admin.bill.inhoadon',compact('bill','bill_detail','total_price'));
    }

}
