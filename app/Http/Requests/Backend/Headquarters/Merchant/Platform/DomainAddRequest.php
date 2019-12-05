<?php

namespace App\Http\Requests\Backend\Headquarters\Merchant\Platform;

use App\Http\Requests\BaseFormRequest;

/**
 * Class for do add request.
 */
class DomainAddRequest extends BaseFormRequest
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
     * Get the validation rules that apply to the request .
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'platform_sign' => 'required|exists:system_platforms,sign', //平台ID
            'domain' => 'required|unique:system_domains', //域名
            'status' => 'required|in:0,1', //状态 0关闭 1开启
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
