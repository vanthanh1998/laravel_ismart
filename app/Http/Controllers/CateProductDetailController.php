<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate_Product_Detail;
use App\Cate_Product;
use App\Product;
use App\Http\Requests\CateProductDetailRequest;
use DB;
use Yajra\DataTables\DataTables;
class CateProductDetailController extends Controller
{
    public function get_list(){
    	$cate_detail = DB::table('cate_product_detail')->orderBy('created_at','desc')->paginate(5);
    	$num_rows = DB::table('cate_product_detail')->select('*')->orderBy('created_at','desc')->get();
    	return view('admin.cate_product_detail.list',compact('cate_detail','num_rows'));
    }

    public function getData(Request $request){
        if($request->ajax()){
            $cate_product_detail  = Cate_Product_Detail::latest()->get();
            return DataTables::of($cate_product_detail)
                ->addColumn('action', function($cate_product_detail){
                    $button = '<a href="'.url('admin/cate_product_detail/edit/'.$cate_product_detail->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$cate_product_detail->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($cate_product_detail) {
                    return '<input type="checkbox" data-id="'.$cate_product_detail->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('status', function ($cate_product_detail) {
                    $status = $cate_product_detail->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$cate_product_detail->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->addColumn('cate_product',function($cate_product_detail){
                    $parent = DB::table('cate_product')->where('id',$cate_product_detail->parent_id)->first();
                    return $parent->name;
                })
                ->rawColumns(['action','checkbox','status','cate_product'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }

    public function get_add(){
    	$cate = Cate_Product::select('id','name')->get()->toArray();
    	// show_array($cate);
    	return view('admin.cate_product_detail.add',compact('cate'));
    }
    public function post_add(CateProductDetailRequest $request){
    	$cate_detail = new Cate_Product_Detail();
    	$cate_detail->name = $request->txtname_cate;
    	$cate_detail->alias = changeTitle($request->txtcat_id);
    	$cate_detail->parent_id = $request->sltcate;
    	$cate_detail->save();
    	return redirect()->route('get.list.cate_product_detail')->with('success','Th??m m???i lo???i s???n ph???m th??nh c??ng');
    }
    public function get_edit($id){
    	$cate_detail = Cate_Product_Detail::find($id)->toArray();// loai s???n ph???m
    	$cate = Cate_Product::select('name','id')->get()->toArray();// all danh m???c sp
    	// show_array($cate_detail);
    	return view('admin.cate_product_detail.edit',compact('cate_detail','cate'));
    }
    public function post_edit(Request $request,$id){
    	$this->validate($request,
    		['txtname_cate'=>'required|unique:cate_product_detail,name,'.$id],
            ['txtname_cate.required'=>'B???n ch??a nh???p t??n lo???i s???n ph???m',
                'txtname_cate.unique' => 'T??n lo???i s???n ph???m ???? t???n t???i']
    	);
    	$cate_detail = Cate_Product_Detail::find($id);
    	$cate_detail->name = $request->txtname_cate;
    	$cate_detail->alias = changeTitle($request->txtname_cate);
    	$cate_detail->parent_id = $request->sltcate;
    	$cate_detail->save();
    	return redirect()->route('get.list.cate_product_detail')->with('success','C???p nh???t lo???i s???n ph???m th??nh c??ng');
    }
    public function get_delete($id){
        $category_product = Product::where('cate_product_detail_id',$id)->count();
        if($category_product == 0){
            $cate_detail = Cate_Product_Detail::find($id);
            $cate_detail->delete($id);
            return response()->json([
                'success' => true,
                'message' =>'X??a th??nh c??ng',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'B???n kh??ng th??? x??a lo???i s???n ph???m c?? ch???a s???n ph???m',
            ]);
        }
    }


    public function changeStatusCateProductDetail(Request $request){
        $cate_detail = Cate_Product_Detail::find($request->id);
        if(!$cate_detail){
            echo "error";
        }else{
            $cate_detail->status = $request->status;
            $cate_detail->save();
            return response(['success'=>'Success']);
        }
    }
}
