<?php

namespace App\Http\Requests;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'=>'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'phone'=>'required|unique:users,phone|min:10|max:10',
            'address'=>'required',
            'gender'=>'required',
            'confirm_password' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
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
        ];
    }
}
