<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required',
            'confirm_pass' =>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Trường này không được để trống',
            'confirm_pass.required' => 'Trường này không được để trống',
            'confirm_pass.same' =>'Mật khẩu xác nhận không đúng'
        ];
    }
}
