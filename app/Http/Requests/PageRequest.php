<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'page_title' => 'required|unique:page,page_title',
        ];
    }
    public function messages()
    {
        return [
            'page_title.required' => 'Vui lòng nhập tiêu đề trang',
            'page_title.unique' => 'Tiêu đề trang đã tồn tại',
        ];
    }
}
