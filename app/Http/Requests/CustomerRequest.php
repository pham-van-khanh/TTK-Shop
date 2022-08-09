<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email'=> 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'name'=> 'required',
            'address'=> 'required',
            'note'=> 'required',
        ];
    }
    public function messages(Type $var = null)
    {
        # code...
        return [
            'email.required'=> 'Email không được để trống',
            'email.email'=> 'Định dạng email',
            'name.required'=> 'Name không được để trống',
            'phone.required'=> 'Số điện thoại không được để trống',
            'address.required'=> 'Địa chỉ không được để trống',
            'phone.regex' => 'Số điện thoại không được đúng định dạng',
            'note.required'=> 'Bạn có ghi chú gì không  ?'
        ];
    }
}
