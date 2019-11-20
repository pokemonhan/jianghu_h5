<?php

namespace App\Http\Requests\Backend\Headquarters\FinanceVendor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddDoRequest
 * @package App\Http\Requests\Backend\Headquarters\FinanceVendor
 */
class AddDoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|unique:system_finance_vendors,name',
                'sign' => ['required', 'unique:system_finance_vendors,sign', 'regex:/\w+/'],
                'whitelist_ips' => 'array|nullable',
            ];
        }
        return [];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写厂商名称',
            'name.unique' => '厂商名称已存在',
            'sign.required' => '请填写厂商标记',
            'sign.unique' => '厂商标记已存在',
            'sign.regex' => '厂商标记只能包含数字,字母,下划线',
            'whitelist_ips.array' => 'ip白名单为数组格式',
        ];
    }
}
