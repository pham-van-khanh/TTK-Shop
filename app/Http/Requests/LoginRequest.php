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
            'email'=> 'required|email|min:6|max:32',
            'password'=> 'required',
            'name'=> 'required|min:8',
            'username'=> 'required|min:8',
            'code'=> 'required',
        ];
    }
    public function messages(Type $var = null)
    {
        # code...
        return [
            'email.required'=> 'Email không để trống',
            'username.required'=> 'Username  không để trống',
            'email.min'=> 'Email min 6 kí tự',
            'email.max'=> 'Email max 32 kí tự',
            'email.email'=> 'Định dạng email',
            'password.required'=> 'Password không để trống',
            'name.required'=> 'Name không để trống',
            'code.required'=> 'Code không để trống',
            'name.min'=> 'name min 8 kí tự',
        ];
    }
}
