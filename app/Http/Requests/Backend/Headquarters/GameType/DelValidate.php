<?php

namespace App\Http\Requests\Backend\Headquarters\GameType;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DelValidate
 * @package App\Http\Requests\Backend\Headquarters\GameType
 */
class DelValidate extends FormRequest
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
                'id' => 'required|exists:games_types,id',
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
