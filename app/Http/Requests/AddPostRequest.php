<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'title'   => 'required|unique:posts,title|min:3|max:50',
            'status'  => 'required|in:0,1',
            'content' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'Bạn chưa nhập tiêu đề!',
            'title.unique'     => 'Tiêu đề đã tồn tại, vui lòng nhập lại!',
            'title.min'        => 'Tiêu đề gồm ít nhất 3 ký tự!',
            'title.max'        => 'Tiêu đề gồm tối đa 50 ký tự!',  
            'content.required' => 'Bạn chưa nhập nội dung',
            'content.min'      => 'Nội dung gồm ít nhất 3 ký tự!',
        ];
     }
}
