<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate_product;
use App\Cate_Product_Detail;
use App\Http\Requests\CateProductRequest;
use DB;
use Yajra\DataTables\DataTables;

class CateProductController extends Controller
{
    public function get_list(){
        $cate = DB::table('cate_product')->select('*')->orderBy('created_at','desc')->paginate(10);
    	$num_rows = DB::table('cate_product')->select('*')->orderBy('created_at','desc')->get();
    	return view('admin.cate_product.list',compact('cate','num_rows'));
    }

    public function getData(Request $request){
        if($request->ajax()){
            $cate_product  = Cate_product::latest()->get();
            return DataTables::of($cate_product)
                ->addColumn('action', function($cate_product){
                    $button = '<a href="'.url('admin/cate_product/edit/'.$cate_product->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$cate_product->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($cate_product) {
                    return '<input type="checkbox" data-id="'.$cate_product->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('status', function ($cate_product) {
                    $status = $cate_product->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$cate_product->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->rawColumns(['action','checkbox','status','cate_product'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }

    public function get_add(){
    	return view('admin.cate_product.add');
    }
    public function post_add(CateProductRequest $request){
    	$cate = new Cate_product();
    	$cate->name = $request->txtcatename;
    	$cate->alias = changeTitle($request->txtcatename);
    	$cate->keyword = $request->txtkeyword;
    	$cate->save();
    	return redirect()->route('get.list.cate_product')->with('success','Th??m m???i danh m???c th??nh c??ng');
    }
    public function get_edit($id){
    	$cate = DB::table('cate_product')->find($id);
    	return view('admin.cate_product.edit',compact('cate'));
    }
    public function post_edit(Request $request,$id){
    	$this->validate($request,
    		['txtcatename'=>'required|unique:cate_product,name,'.$id],
            ['txtcatename.required'=>'B???n ch??a nh???p t??n danh m???c',
             'txtcatename.unique'=>'T??n danh m???c ???? t???n t???i']
    	);
    	$cate = Cate_product::find($id);
    	$cate->name = $request->txtcatename;
    	$cate->alias = changeTitle($request->txtcatename);
    	$cate->keyword = $request->txtkeyword;
    	$cate->save();
    	return redirect()->route('get.list.cate_product')->with('success','C???p nh???t danh m???c th??nh c??ng');
    }
    public function get_delete($id){
        $cate_detail_product = Cate_Product_Detail::where('parent_id',$id)->count();
        if($cate_detail_product == 0){
            $cate = Cate_product::find($id);
            $cate->delete($id);
            return response()->json([
                'success' => false,
                'message' =>'X??a th??nh c??ng',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'B???n kh??ng th??? x??a danh m???c c?? ch???a lo???i s???n ph???m',
            ]);
        }
    }

    public function changeStatusCateProduct(Request $request){
        $cate = Cate_product::find($request->id);
        if(!$cate){
            echo "error";
        }else{
            $cate->status = $request->status;
            $cate->save();
            return response(['success'=>'Success']);
        }
    }
}
