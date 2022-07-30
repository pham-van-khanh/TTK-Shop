<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password'=>'required|min:2'
           
        ];
    }
    public function messages(Type $var = null)
    {
        # code...
        return [
            'email.required' =>'Bắt buộc nhập email',
            'email.email' =>'Phải là email',
            'password.required'=>'Bắt buộc nhập password',
            'password.min'=>'Password phải trên 2 ký tự'
        ];
    }
}
