<?php

namespace App\Http\Requests\Backend\Headquarters\GameVendor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DelRequest
 * @package App\Http\Requests\Backend\Headquarters\GameVendor
 */
class DelRequest extends FormRequest
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
                'id' => 'required|exists:games_vendors,id',
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
        ];
    }
}
