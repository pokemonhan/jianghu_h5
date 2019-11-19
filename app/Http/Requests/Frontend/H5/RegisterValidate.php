<?php

namespace App\Http\Requests\Frontend\H5;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterValidate
 * @package App\Http\Requests\Frontend\H5
 */
class RegisterValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'phone_number' => 'required|regex:/^1[0-9]{10}$/|unique:frontend_users_specific_infos,mobile',
            'password' => 'required|min:6|confirmed',
            'invite_code' => 'required|exists:frontend_users,invite_code',
            'verify_code' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages() :array
    {
        return [
            'phone_number.required' => '请填写手机号',
            'phone_number.regex' => '请填写正确的手机号',
            'phone_number.unique' => '此手机号已注册',
            'password.required' => '请填写密码',
            'password.min' => '密码不能低于6位',
            'password.confirmed' => '两次密码不一致',
            'invite_code.required' => '请填写邀请码',
            'invite_code.exists' => '邀请码不存在',
            'verify_code.required' => '请填写验证码',
        ];
    }
}
