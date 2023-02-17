<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'post_name' => 'required|unique:post,post_name',
            'fimage' =>'required|image',
            'featured_post' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'post_name.required' => 'Vui lòng nhập tên bài viết',
            'post_name.unique' => 'Tên bài viết này đã tồn tại',
            'fimage.required' => 'Vui lòng upload image',
            'fimage.image' => 'File này không phải là image',
            'featured_post.required' =>'Vui lòng chọn bài viết nổi bật'
        ];
    }
}
