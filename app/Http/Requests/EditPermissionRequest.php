<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPermissionRequest extends FormRequest
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
            'name'         =>'required|min:2|max:20|unique:permissions,name,'.$this->permission.',id',
            'display_name' =>'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Bạn chưa nhập Tên!',
            'name.unique'     => 'Tên đã tồn tại, vui lòng nhập lại!',
            'name.min'        => 'Tên gồm ít nhất 2 ký tự!',
            'name.max'        => 'Tên gồm tối đa 20 ký tự!',  
            'display_name.required' => 'Bạn chưa nhập tên hiển thị',
            'display_name.min'      => 'Tên hiển thị gồm ít nhất 3 ký tự!',
        ];
     }
}
