<?php

namespace App\Http\Requests\Backend\Headquarters\FinanceType;

use App\Http\Requests\BaseFormRequest;

/**
 * Class IndexDoRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\FinanceType
 */
class IndexDoRequest extends BaseFormRequest
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
                'status' => 'integer|in:0,1', //状态 1 启用 0 禁用
                'name'   => 'string|max:64',  //类型名
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'status.in'   => '所选状态不存在',
                'name.string' => '分类名称不符合规则',
               ];
    }
}
