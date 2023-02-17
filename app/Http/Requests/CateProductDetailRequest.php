<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateProductDetailRequest extends FormRequest
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
            'txtcat_id' => 'required|unique:cate_product_detail,name',
        ];
    }
    public function messages()
    {
        return [
            'txtcat_id.required' => 'Vui lòng nhập tên loại sản phẩm',
            'txtcat_id.unique' => 'Tên loại sản phẩm đã tồn tại',
        ];
    }
}
