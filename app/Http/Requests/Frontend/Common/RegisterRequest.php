<?php

namespace App\Http\Requests\Frontend\Common;

use App\Http\Requests\BaseFormRequest;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Frontend\Common
 */
class RegisterRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'invite' => 'string',
            'mobile' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
                'unique:frontend_users',
            ],
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d].{7,15}$/',
            ],
            'password_confirmation' => 'required',
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
            'mobile.unique' => '手机号已存在',
            'password.regex' => '密码必须由8-16位大小写字母加数字组成',
        ];
    }
}
