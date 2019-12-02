<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\MerchansAdminUser;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Models\Admin\MerchantAdminAccessGroup;
use App\Models\Admin\MerchantAdminAccessGroupsHasBackendSystemMenu;
use App\Models\Admin\MerchantAdminUser;
use App\Models\SystemPlatform;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class for merchant admin user do add action.
 */
class DoAddAction
{
    /**
     * @param BackEndApiMainController $contll     Controller.
     * @param array                    $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        DB::beginTransaction();
        try {
            //生成平台
            $platformEloq = $this->createPlatform($inputDatas, $contll->currentAdmin->id);
            //生成域名
            $this->createPlatformDomain($inputDatas, $platformEloq->sign);
            //生成超级管理员组
            $adminGroupEloq = $this->createAdminGroup($platformEloq->sign);
            //生成管理员组权限
            $this->createGroupRole($inputDatas, $adminGroupEloq->id);
            //生成运营商帐号
            $adminUser = $this->createAdminUser($inputDatas, $adminGroupEloq->id);
            //插入平台所属人id
            $this->editPlatformOwner($platformEloq, $adminUser->id);
            //完成
            DB::commit();
            return msgOut(true, ['platform_name' => $inputDatas['platform_name']]);
        } catch (Exception $e) {
            DB::rollback();
            throw new \Exception('300705');
        }
    }

    /**
     * Creates a platform.
     * @param array   $inputDatas 接收的参数.
     * @param integer $adminId    管理员ID.
     * @return SystemPlatform
     */
    private function createPlatform(array $inputDatas, int $adminId)
    {
        $platformEloq = new SystemPlatform();
        $platformData = [
            'name' => $inputDatas['platform_name'],
            'sign' => $inputDatas['platform_sign'],
            'author_id' => $adminId,
            'last_editor_id' => $adminId,
        ];
        $platformEloq->fill($platformData);
        $platformEloq->save();
        return $platformEloq;
    }

    /**
     * Creates a platform domain.
     * @param array $inputDatas 接收的参数.
     * @param string $platformSign 平台标识.
     * @return void
     */
    private function createPlatformDomain($inputDatas, $platformSign)
    {
        // $domains = $inputDatas['domains'];
        // foreach ($domains as $domain) {
        //     # co
        // }
    }
    /**
     * Creates an admin group.
     * @param string $platformSign 平台标识.
     * @return MerchantAdminAccessGroup
     */
    private function createAdminGroup(string $platformSign)
    {
        $adminGroupEloq = new MerchantAdminAccessGroup();
        $adminGroupData = [
            'group_name' => '超级管理',
            'platform_sign' => $platformSign,
            'is_super' => MerchantAdminAccessGroup::IS_SUPER,
        ];
        $adminGroupEloq->fill($adminGroupData);
        $adminGroupEloq->save();
        return $adminGroupEloq;
    }

    /**
     * Creates a group role.
     * @param array   $inputDatas   接收的参数.
     * @param integer $adminGroupId 管理员角色组ID.
     * @return void
     */
    private function createGroupRole(array $inputDatas, int $adminGroupId)
    {
        $role = Arr::wrap(json_decode($inputDatas['role'], true));
        foreach ($role as $menuId) {
            $roleData = [
                'group_id' => $adminGroupId,
                'menu_id' => $menuId,
            ];
            $roleEloq = new MerchantAdminAccessGroupsHasBackendSystemMenu();
            $roleEloq->fill($roleData);
            $roleEloq->save();
        }
    }

    /**
     * Creates an admin user.
     * @param array   $inputDatas   接收的参数.
     * @param integer $adminGroupId 管理员角色组ID.
     * @return MerchantAdminUser
     */
    private function createAdminUser(array $inputDatas, int $adminGroupId)
    {
        $adminData = [
            'name' => $inputDatas['username'],
            'email' => $inputDatas['email'],
            'password' => bcrypt($inputDatas['password']),
            'group_id' => $adminGroupId,
        ];
        return MerchantAdminUser::create($adminData);
    }

    /**
     * @param SystemPlatform $platformEloq 平台eloq.
     * @param integer        $adminUserId  平台所属超级管理员ID.
     */
    private function editPlatformOwner(SystemPlatform $platformEloq, int $adminUserId)
    {
        $platformEloq->owner_id = $adminUserId;
        $platformEloq->save();
    }
}
