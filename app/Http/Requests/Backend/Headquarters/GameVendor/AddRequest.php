<?php

namespace App\Http\Requests\Backend\Headquarters\GameVendor;

use App\Http\Requests\BaseFormRequest;
use App\Models\Game\GameVendor;

/**
 * Class AddRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\GameVendor
 */
class AddRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [GameVendor::class];

    /**
     * @var array 自定义字段 【此字段在数据库中没有的字段字典】
     */
    protected $extraDefinition = [
        'whitelist_ips.*' => '白名单',
    ];

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
        $result = [
                   'name'               => 'required|string|max:64|unique:game_vendors,name',
                   'sign'               => 'required|string|max:6|unique:game_vendors,sign',
                   'whitelist_ips'      => 'array',
                   'whitelist_ips.*'    => 'ip',
                   'type_id'            => 'required|integer',
                   'urls'               => 'required|array',
                   'urls.*'             => 'url',
                   'test_urls'          => 'array',
                   'test_urls.*'        => 'url',
                   'app_id'             => 'string|nullable',
                   'authorization_code' => 'string|max:128',
                   'merchant_id'        => 'string|max:10',
                   'merchant_secret'    => 'string|max:128',
                   'public_key'         => 'string|max:2048',
                   'private_key'        => 'string|max:2048',
                   'des_key'            => 'string|max:64',
                   'md5_key'            => 'string|max:32',
                   'status'             => 'required|integer|in:0,1',
                  ];
        return $result;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'whitelist_ips' => 'cast:array',
        ];
    }
}
