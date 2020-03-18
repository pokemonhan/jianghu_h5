<?php

namespace App\Http\Requests\Backend\Headquarters\Admin\BackendAdminUser;

use App\Http\Requests\BaseFormRequest;
use App\Models\Admin\BackendAdminUser;

/**
 * 生成总后台管理员用户
 */
class CreateRequest extends BaseFormRequest
{
    
    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [BackendAdminUser::class];
    
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
        $rules = [
                  'name'     => 'required|string|max:16|unique:backend_admin_users', //用户名
                  'email'    => 'required|email|max:64|unique:backend_admin_users', //邮箱
                  'password' => [
                                 'required',
                                 'regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/',//(必须存在大小写字母+数字的8-16位)
                                ], //密码
                  'group_id' => 'required|integer|exists:backend_admin_access_groups,id', //管理员组ID
                 ];
        return $rules;
    }
}
