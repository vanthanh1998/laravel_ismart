<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatePostRequest extends FormRequest
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
            'txtcatename' => 'required|unique:cate_post,name',
        ];
    }
    public function messages()
    {
        return [
            'txtcatename.required' => 'Vui lòng nhập tên danh mục',
            'txtcatename.unique' => 'Tên danh mục đã tồn tại',
        ];
    }
}
