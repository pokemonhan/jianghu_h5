<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Models\Admin\MerchantAdminUser;
use App\Models\Admin\MerchantAdminAccessGroup;
use App\Models\Admin\MerchantAdminAccessGroupsHasBackendSystemMenu;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Exception;

/**
 * Class for merchant admin user do add action.
 */
class MerchantAdminUserDoAddAction
{
    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        DB::beginTransaction();
        try {
            //生成超级管理员组
            $adminGroupEloq = new MerchantAdminAccessGroup();
            $adminGroupEloq->fill(['group_name' => '超级管理组']);
            $adminGroupEloq->save();

            //生成管理员组权限
            $role = Arr::wrap(json_decode($inputDatas['role'], true));
            foreach ($role as $menuId) {
                $roleData = [
                    'group_id' => $adminGroupEloq->id,
                    'menu_id' => $menuId,
                ];
                $roleEloq = new MerchantAdminAccessGroupsHasBackendSystemMenu();
                $roleEloq->fill($roleData);
                $roleEloq->save();
            }

            //生成运营商帐号
            $adminData = [
                'name' => $inputDatas['name'],
                'email' => $inputDatas['email'],
                'password' => bcrypt($inputDatas['password']),
                'group_id' => $adminGroupEloq->id,
            ];
            MerchantAdminUser::create($adminData);

            DB::commit();
            return msgOut(true, ['name' => $inputDatas['name']]);
        } catch (Exception $e) {
            DB::rollback();
            return msgOut(false);
        }
    }
}
