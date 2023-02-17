<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\User;
use Illuminate\Support\MessageBag;
use Mail;
use Carbon\Carbon;
use Validator;


class RegisterController extends Controller
{
    public function get_register(){
        return view('pages.user.register');
    }
    public function post_register(Request $request){
        $rules = [
            'fullname'=>'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'phone'=>'required|unique:users,phone|min:10|max:10',
            'address'=>'required',
            'gender'=>'required',
            'confirm_password' => 'required|same:password',
            'captcha' => 'required|captcha'
        ];
        $messages = [
            'fullname.required' => 'Vui lòng nhập Họ tên',
            'username.required' => 'Vui lòng nhập Tên đăng nhập',
            'username.unique' => 'Tên đăng nhập này đã tồn tại',
            'email.required' => 'Vui lòng nhập Email',
            'email.unique'=>'Email đã tồn tại',
            'phone.required'=>'Vui lòng nhập Số điện thoại',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'phone.min'=>'Độ dài gồm 10 kí tự',
            'phone.max'=>'Độ dài gồm 10 kí tự',
            'address.required'=>'Vui lòng nhập Địa chỉ',
            'password.required' => 'Vui lòng nhập Mật khẩu',
            'gender.required' => 'Vui lòng chọn Giới tính',
            'confirm_password.required' => 'Vui lòng nhập lại Mật khẩu xác nhận',
            'confirm_password.same'=>'Mật khẩu xác nhận không đúng',
            'captcha.required' => 'Vui lòng nhập hình ảnh xác thực',
            'captcha.captcha' => 'Hình ảnh xác thực không chính xác'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),
            ]);
        }else{
            $user = new User();
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->remember_token= $request->_token;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->save();
//            $errors = new MessageBag(['errorAll' => '']);
            return response()->json([
                'error' => false,
                'message' => 'Đăng ký thành công',
            ]);
        }
//        if($user->id){
//            // xử lí xác nhận tài khoản gửi mail
//            $email = $user->email;
//            $token = Hash::make(md5(time().$email));
//
//            $user->token_active = $token;
//            $user->time_active = Carbon::now();
//            $user->save();
//
//            $url = route('user.verify.account',['id'=>$user->id,'token'=>$token]);
//            $data = ['route' => $url];
//
//            Mail::send('emails.verify_account',$data, function($message) use ($email){
//              $message->from('thanhchonthanh@gmail.com','ThanhRain');
//              $message->to($email,'Verify Account')->subject('Xác nhận tài khoản');
//            });

//        }
    }
    public function get_refresh(){
        return captcha_img('flat');
    }
    // xác nhận tài khoản
    public function verify_account(Request $request){
        $token = $request->token;
        $id= $request->id;

        $checkUser = User::where([
            'token_active' => $token,
            'id' =>$id
        ])->first();
        // dd($checkUser);
        if(!$checkUser){
            return redirect('dashboard')->with('danger','Xin lỗi ! Đường dẫn xác nhận tài khoản không tồn tại, xin vui lòng kiểm tra lại.');
        }
        $checkUser->active =1;
        $checkUser->save();
        return redirect('dang-nhap')->with('success','
                Xác nhận tài khoản thành công');
    }
}
