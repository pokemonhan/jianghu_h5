<?php

namespace App\Http\Controllers\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Http\Controllers\Requests\BaseFormRequest;

/**
 * Class for menu edit request.
 */
class MenuEditRequest extends BaseFormRequest
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
            'label' => 'required|regex:/[\x{4e00}-\x{9fa5}]+/u', //操作日志
            'en_name' => 'required|regex:/^(?!\.)(?!.*\.$)(?!.*?\.\.)[a-z.-]+$/', //operation.log
            'display' => 'required|numeric|in:0,1',
            'menu_id' => 'required|numeric',
            'route' => 'required|regex:/^(?!.*\/$)(?!.*?\/\/)[a-z\/-]+$/', // /operasyon/operation-log
            'icon' => 'regex:/^(?!\-)(?!.*\-$)(?!.*?\-\-)(?!\ )(?!.*\ $)(?!.*?\ \ )[a-z0-9 -]+$/',
            'is_parent' => 'numeric|in:0,1',
            'parent_id' => 'numeric|required_unless:is_parent,1',
            //anticon anticon-appstore  icon-6-icon
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
