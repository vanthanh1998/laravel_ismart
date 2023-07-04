<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cate_Product_Detail;
use App\User;
use App\List_image;
use File;
use App\Http\Requests\ProductRequest;
use Input;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
// use Illuminate\Http\Request;// sd cái này thì $request->txtName-> mới update product đc.
//use Request; // thêm cái này thì sd ajax xóa hình ảnh list_image đc. Sd cái này thì bắt buộc phải $request->input('txtName') thì mới update product đc. có cái này thì mất cái kia dcm


class ProductController extends Controller
{
    public function get_list(){
    	return view('admin.product.list');
    }

    public function getData(Request $request){
        if($request->ajax()){
            $products  = Product::latest()->get();
            return DataTables::of($products)
                ->addColumn('action', function($products){
                    $button = '<a href="'.url('admin/product/edit/'.$products->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$products->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($products) {
                    return '<input type="checkbox" data-id="'.$products->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('image', function ($products) {
                    $url = asset("/upload/product/$products->image");
                    return '<img src='.$url.' border="0"  class="img-rounded" align="center" />';
                })
                ->addColumn('status', function ($products) {
                    $status = $products->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$products->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->addColumn('cate_product',function($products){
                    $cate_detail = Cate_product_detail::where('id', $products->cate_product_detail_id)->first();
                    return  $cate_detail->name;
                })
                ->addColumn('product_name',function($products){
                    $product_info = "<span>$products->product_name</span><br>";
                    $product_info .= '
                                        <span><i class="fa fa-usd" aria-hidden="true"> '.number_format($products->price_new,0,"," , ".").'  (đ)</i></span>
                                       ';
                    return $product_info;
                })
                ->rawColumns(['action','checkbox','image','status','cate_product','product_name'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }


    public function changeStatusProduct(Request $request){
        $product = Product::find($request->id);
        if(!$product){
            echo "error";
        }else{
            $product->status = $request->status;
            $product->save();

            return response()->json(['success'=>'Thay đổi trạng thái thành công']);
        }
    }

    public function get_add(){
    	$cate_detail = Cate_Product_Detail::select('*')->get()->toArray();
    	$user = User::select('*')->get()->toArray();
    	$image = List_image::select('*')->get()->toArray();
    	return view('admin.product.add',compact('cate_detail','user','image'));
    }
    public function post_add(ProductRequest $request){
        dd('aaaaa');
    	$file = $request->file('fimage'); // lấy file image

        dd($file);
        $file_name = $file->getClientOriginalName();

    	$product = new Product();
    	$product->product_name = $request->product_name;
    	$product->alias = changeTitle($request->product_name);
    	$product->image = $file_name;
    	$product->price_new = $request->price_new;
    	$product->price_old = $request->price_old;
    	$product->desc = $request->desc;
    	$product->content = $request->content;
    	$product->qty_product = $request->qty_product;
    	$product->admin_id = get_data_user('admin');
    	$product->cate_product_detail_id = $request->sltcate_detail;
    	$product->selling_product = $request->selling_product;
    	$product->featured_product = $request->featured_product;

    	$file->move('upload/product//',$file_name); // $file là: $request->file('fImages')
        dd($product);

        $product->save();


        // list_image
        $product_id = $product->id; // lấy id
        if($request->hasFile('hinhchitiet')){
            foreach($request->file('hinhchitiet') as $file){
                $product_img = new List_image();
                if(isset($file)){
                    $file_name = $file->getClientOriginalName();
                    $product_img->image = $file_name;
                    $product_img->product_id = $product_id;
                    $file->move('upload/product/_detail/',$file_name);
                    $product_img->save();
                }
            }
        }

        return redirect()->route('get.list.product')->with('success','Thêm sản phẩm thành công');
    }
    public function get_edit($id){
    	$cate_detail = Cate_Product_Detail::select('*')->get()->toArray();

        $product = Product::find($id)->toArray();
        // show_array($product);
        $list_image = Product::find($id)->fimage->toArray();// lấy 1 sản phẩm có danh sách hình:
    	return view('admin.product.edit',compact('cate_detail','product','list_image'));
    }
    public function post_edit(Request $request,$id){
         $this->validate($request,
             ['product_name'=>'required|unique:product,product_name,'.$id],
             ['product_name.required'=>'Bạn chưa nhập tên sản phẩm',
              'product_name.unique'=>'Tên sản phẩm đã tồn tại']
         );
    	$product = Product::find($id);
    	$product->product_name = $request->input('product_name');
    	$product->alias = changeTitle($request->input('product_name'));
    	$product->price_new = $request->input('price_new');
    	$product->price_old = $request->input('price_old');
    	$product->desc = $request->input('desc');
    	$product->content = $request->input('content');
    	$product->qty_product = $request->input('qty_product');
    	$product->cate_product_detail_id = $request->input('sltcate_detail');
    	$product->selling_product = $request->input('selling_product');
    	$product->featured_product = $request->input('featured_product');

    	$img_current = 'upload/product//'.$request->input('img_current');// tạo input hidden có name là img_current
        // echo $img_current;// ~~ public/upload/midu.jpg
        if(!empty($request->file('fimage'))){
            $file = $request->file('fimage'); // lấy file image
            $file_name = $file->getClientOriginalName();
            $product->image= $file_name;
            $file ->move('upload/product//',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "k có file";
        }
        $product->save();

        // list-images
        if(!empty($request->file('list_fImages'))){ // cái list_fImages trong myscript.js phải có name = list_fImages[] ~~ => dấu [] đó dcm
            foreach($request->file('list_fImages') as $file){
                $product_img = new List_image();
                if(isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id= $id;
                    $file->move('upload/product/_detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('get.list.product')->with('success','Cập nhật sản phẩm thành công');

    }
    // ajax delete img
    public function getDeleteImages(Request $request,$id){
        if($request->ajax()){
            $idHinh = (int)$request->get('idHinh');
            $image_detail = List_image::find($idHinh);
            if(!empty($image_detail)){
                $img = 'upload/product/_detail/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "oke";
        }
    }
    public function get_delete($id){
        $list_image = Product::find($id)->fimage->toArray();
        foreach($list_image as $image){
            File::delete('upload/product/_detail/'.$image['image']);// xóa hình trong list_image
        }
        $product = Product::find($id);
        File::delete('upload/product//'.$product['image']);
        $product->delete($id);
        return response()->json([
            'success' => true,
            'message' =>'success',
        ]);
    }
    public function get_delete_all(Request $request){

        $array = $request->input('id');
        $product = Product::whereIn('id', $array);
        foreach($product as $image){
            File::delete('upload/product//'.$image['image']);// xóa hình trong list_image
        }
        $product->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }

}
