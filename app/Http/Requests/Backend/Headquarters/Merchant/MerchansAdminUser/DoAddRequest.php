<?php

namespace App\Http\Requests\Backend\Headquarters\Merchant\MerchansAdminUser;

use App\Http\Requests\BaseFormRequest;

/**
 * Class for do add request.
 */
class DoAddRequest extends BaseFormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:merchant_admin_users,name', //超管名称
            'email' => 'required|email|unique:merchant_admin_users', //超管邮箱
            'password' => 'required|string', //密码
            'platform_name' => 'required|unique:system_platforms,name', //平台名称
            'platform_sign' => 'required|unique:system_platforms,sign', //平台标识
            'agenty_method' => 'required|string', //代理方式
            'domains' => 'required|array', //域名
            'role' => 'required|string', //权限
            'status' => 'required|integer|in:0,1', //开启状态
            'start_time' => 'required|date_format:Y-m-d H:i:s', //开始时间
            'end_time ' => 'required|date_format:Y-m-d H:i:s', //结束时间
        ];
    }

    /*public function messages()
{
return [
'lottery_sign.required' => 'lottery_sign is required!',
'trace_issues.required' => 'trace_issues is required!',
'balls.required' => 'balls is required!'
];
}*/
}
