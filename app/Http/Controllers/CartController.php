<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate_Product_Detail;
use App\Cate_product;
use App\User;
use App\Product;
use DB,Mail,Cart,Auth;
use App\Bill;
use App\Bill_detail;
use Yajra\DataTables\DataTables;
use Validator;
use App\Mail\CheckoutEmail;


class CartController extends Controller
{
    public function getListCart(Request $request){
        $products = Cart::content();
        return view('pages.cart.giohang',compact('products'));
    }

    public function addProduct(Request $request,$id){
        $product = DB::table('product')->select('*')->find($id);
        if($product->qty_product <= $request->num_order){
            echo "<script>
                alert('Số lượng không còn đủ để cung cấp cho bạn! Thật lòng xin lỗi quý khách!');
                window.location.href = '";
                echo url('ctsp/'.$product->id.'/'.$product->alias);
            echo"'</script>";
        }else{

            $data = [];
            $data ['cart'] = Cart::add([
                'id' => $product->id,
                'name' =>$product->product_name,
                'qty' => 1,
                'price' =>$product->price_new,
                'weight' => 550,
                'options' => ['img' => $product->image,'qty_product' => $product->qty_product],
            ]);
            return redirect()->back();
//            return response()->json($data);
        }
    }

    public function getDeleteCart($id){
        Cart::remove($id);
    	return response()->json([
    	    'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
    public function getDelete_all_cart(){
        Cart::destroy();
        return response()->json([
            'success' => true,
            'message' => 'Xóa all thành công'
        ]);
    }
    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }

    public function getcheckout(){
        $user = User::where('id',Auth::user()->id)->first()->toArray();
        $cart = Cart::content();
    	return view('pages.cart.checkout',compact('user','cart'));
    }
    public function postcheckout(Request $request){
        $cart_detail = Cart::content();
        $rules = [
            'fullname'=>'required',
            'email' => 'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'=>'required',
        ];
        $messages = [
            'fullname.required' => 'Vui lòng nhập Họ tên',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Email không hợp lệ',
            'phone.required'=>'Vui lòng nhập Số điện thoại',
            'phone.regex' => 'Định dạng số điện thoại không hợp lệ',
            'phone.min'=>'Độ dài gồm 10 kí tự',
            'address.required'=>'Vui lòng nhập Địa chỉ',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),
            ]);
        }else{
            if(Auth::check()){
                $bill = new Bill;
                $bill->user_id = Auth::user()->id;
                $bill->fullname = $request->fullname;
                $bill->phone = $request->phone;
                $bill->address = $request->address;
                $bill->email = $request->email;
                $bill->note = $request->note;
                $bill->total_bill = str_replace(',', '', Cart::subtotal());
                $bill->status = 0;
                $bill->save();
                foreach($cart_detail as $item){
                    $bill_detail =  new Bill_detail;
                    $bill_detail->product_id = $item->id;
                    $bill_detail->product_name = $item->name;
                    $bill_detail->image = $item->options->img;
                    $bill_detail->price_new = $item->price;
                    $bill_detail->quality = $item->qty;
                    $bill_detail->sub_total = ($item->price)*($item->qty);

                    $bill_detail->bill_id = $bill->id;// lấy id của bill
                    $bill_detail->save();
                    $sl_ton  = Product::select('*')->where('id',$item->id)->first()->toArray();
                    $sl_update = $sl_ton['qty_product'] - $item->qty;
                    Product::select('*')->where('id',$item->id)->update(['qty_product'=>$sl_update]);
                }
                // thông tin ngdung
                $data['info'] = ['fullname'=> $request->fullname,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->address,'note'=>$request->note];

                $email = $request->email;
                Mail::to("vanthanh0610998@gmail.com")->send(new CheckoutEmail($data['info']));
                Cart::destroy();
                return response()->json([
                    'error' => false,
                    'message' => 'Đặt hàng thành công',
                ]);
            }
        }
    }
    public function getcare_customer(){
      return view('pages.cart.care_customer');
    }
}
