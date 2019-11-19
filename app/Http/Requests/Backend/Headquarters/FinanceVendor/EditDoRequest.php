<?php

namespace App\Http\Requests\Backend\Headquarters\FinanceVendor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EditDoRequest
 * @package App\Http\Requests\Backend\Headquarters\FinanceVendor
 */
class EditDoRequest extends FormRequest
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
                'id' => 'required|exists:system_finance_vendors,id',
                'name' => 'required|unique:system_finance_vendors,name,'.$this->input('id'),
                'sign' => ['required', 'unique:system_finance_vendors,sign,'.$this->input('id'), 'regex:/\w+/'],
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
            'id.required' => 'ID不存在',
            'id.exists' => 'ID不存在',
            'name.required' => '请填写厂商名称',
            'name.unique' => '厂商名称已存在',
            'sign.required' => '请填写厂商标记',
            'sign.unique' => '厂商标记已存在',
            'sign.regex' => '厂商标记只能包含数字,字母,下划线',
        ];
    }
}
