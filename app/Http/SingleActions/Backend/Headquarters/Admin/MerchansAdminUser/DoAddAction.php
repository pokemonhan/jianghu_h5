<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin\MerchansAdminUser;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Models\SystemPlatform;
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
class DoAddAction
{
    /**
     * @param BackEndApiMainController $contll     Controller.
     * @param array                    $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        DB::beginTransaction();
        try {
            //生成平台
            $platformEloq = new SystemPlatform();
            $platformData = [
                'name' => $inputDatas['platform_name'],
                'sign' => $inputDatas['platform_sign'],
                'admin_id' => $contll->currentAdmin->id,
                'last_admin_id' => $contll->currentAdmin->id,
            ];
            $platformEloq->fill($platformData);
            $platformEloq->save();
            //生成超级管理员组
            $adminGroupEloq = new MerchantAdminAccessGroup();
            $adminGroupData = [
                'group_name' => '超级管理组',
                'platform_sign' => $platformEloq->sign,
                'is_super' => MerchantAdminAccessGroup::IS_SUPER,
            ];
            $adminGroupEloq->fill($adminGroupData);
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
                'name' => $inputDatas['username'],
                'email' => $inputDatas['email'],
                'password' => bcrypt($inputDatas['password']),
                'group_id' => $adminGroupEloq->id,
            ];
            MerchantAdminUser::create($adminData);
            //完成
            DB::commit();
            return msgOut(true, ['name' => $inputDatas['username']]);
        } catch (Exception $e) {
            DB::rollback();
            return msgOut(false);
        }
    }
}
