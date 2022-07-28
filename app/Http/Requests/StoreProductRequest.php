<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' =>  'required',
            'description' =>'required',
            'price_old'=>'required|min:6',
            'price_new'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>  'Tên trống !!!',
            'description.required' =>'Mô tả trống !!!',
            'price_old.required'=>'Giá cũ trống !!!',
            'price_old.min'=>'Giá cũ phải trên 6 chữ số !!!',
            'price_new.required'=>'Giá mới trống !!!',
        ];
    }
}
