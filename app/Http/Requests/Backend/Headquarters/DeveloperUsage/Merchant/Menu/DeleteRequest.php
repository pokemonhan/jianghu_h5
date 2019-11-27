<?php

namespace App\Http\Requests\Backend\Headquarters\DeveloperUsage\Merchant\Menu;

use App\Http\Requests\BaseFormRequest;

/**
 * Class for menu delete request.
 */
class DeleteRequest extends BaseFormRequest
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
            'toDelete.*' => 'int|exists:merchant_system_menus,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'toDelete.*.exists' => '需要删除的菜单不存在!',
        ];
    }
}
