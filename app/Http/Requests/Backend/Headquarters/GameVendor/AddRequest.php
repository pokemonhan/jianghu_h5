<?php

namespace App\Http\Requests\Backend\Headquarters\GameVendor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddRequest
 * @package App\Http\Requests\Backend\Headquarters\GameVendor
 */
class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|unique:games_vendors,name',
                'sign' => ['required','regex:/\w+/','unique:games_vendors,sign'],
            ];
        }
        return [];
    }

    /**
     * @return array
     */
    public function messages() :array
    {
        return [
            'name.required' => '请填写游戏厂商名称',
            'name.unique' => '游戏厂商名称已存在',
            'sign.required' => '请填写游戏厂商标记',
            'sign.regex' => '游戏厂商标记只能包含数字,字母,下划线',
            'sign.unique' => '游戏厂商标记已存在',
        ];
    }
}
