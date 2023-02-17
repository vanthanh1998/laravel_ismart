<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cate_product;
use App\Cate_Product_Detail;
use DB;
class SearchController extends Controller
{
    public function getSearch(Request $request){
        $keyword = $request->keyword;
        $search_product = DB::table('cate_product_detail')
            ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
            ->where('cate_product_detail.status',1)
            ->where('product.status',1)
            ->where('product_name','like','%'.$request->keyword.'%')
            ->orwhere('price_new',$request->keyword)
            ->paginate(8);
        $num_rows = DB::table('cate_product_detail')
            ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
            ->where('cate_product_detail.status',1)
            ->where('product.status',1)
            ->where('product_name','like','%'.$request->keyword.'%')
            ->orwhere('price_new',$request->keyword)
            ->get()
            ->toArray();
        return view('pages.search.search_product',compact('search_product','num_rows','keyword'));
    }
//    public function postSearch(Request $request){
//        if($request->ajax()){
//            $keyword = $request->keyword;
//            $search_product = DB::table('cate_product_detail')
//                ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
//                ->where('cate_product_detail.status',1)
//                ->where('product.status',1)
//                ->where('product_name','like','%'.$request->keyword.'%')
//                ->orwhere('price_new',$request->keyword)
//                ->paginate(8);
//            $num_rows = DB::table('cate_product_detail')
//                ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
//                ->where('cate_product_detail.status',1)
//                ->where('product.status',1)
//                ->where('product_name','like','%'.$request->keyword.'%')
//                ->orwhere('price_new',$request->keyword)
//                ->get()
//                ->toArray();
//            return response()->json([
//                'error' => false,
//                'message' => 'success'
//            ]);
////            return response()->json([
////                'error' => false,
////                'message' => 'success'
////            ]);
//        }
//    }
}
