<?php

namespace App\Http\Controllers\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Http\Controllers\Requests\BaseFormRequest;

/**
 * Class for menu delete request.
 */
class MenuDeleteRequest extends BaseFormRequest
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
            'toDelete' => 'required|array',
            'toDelete.*' => 'int',
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
