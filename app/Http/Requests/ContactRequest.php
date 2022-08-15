<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'email'=> 'required|email',
            'name'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
            'address'=> 'required',
            'note'=> 'required',
        ];
    }
public function messages(Type $var = null)
{
   
    return [
        'email.required'=> 'Email không được để trống',
        'email.email'=> 'Định dạng email',
        'name.required'=> 'Name không được để trống',
        'subject.required'=> 'Bạn có ghi chú gì không  ?',
        'message.required'=> 'Bạn có muốn nhắn gì cho chúng tôi không ?'
    ];
}
}
