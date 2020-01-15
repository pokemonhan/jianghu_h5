<?php

namespace App\Http\Requests\Backend\Headquarters\SystemBank;

use App\Http\Requests\BaseFormRequest;

/**
 * Class IndexRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\SystemBank
 */
class IndexRequest extends BaseFormRequest
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
                'status' => 'in:0,1',
                'name'   => 'string',
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'status.in'   => '所选状态不存在',
                'name.string' => '银行名称不符合规则',
               ];
    }
}
