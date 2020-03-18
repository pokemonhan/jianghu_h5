<?php

namespace App\Http\Requests\Backend\Headquarters\Merchant\Platform;

use App\Http\Requests\BaseFormRequest;

/**
 * Class DetailRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\Merchant\Platform
 */
class DetailRequest extends BaseFormRequest
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
                'email'        => 'email|max:64',   //邮箱
                'maintain'     => 'integer|in:0,1', //维护状态
                'status'       => 'integer|in:0,1', //状态
                'created_at'   => 'array',          //生成时间
                'created_at.*' => 'date',           //生成时间
               ];
    }

    /**
     * @return mixed[]
     */
    public function filters(): array
    {
        return ['created_at' => 'cast:array'];
    }
}
