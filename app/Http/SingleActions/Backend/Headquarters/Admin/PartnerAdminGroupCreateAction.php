<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Models\Admin\BackendAdminAccessGroup;
use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use App\Models\DeveloperUsage\Backend\BackendAdminAccessGroupDetail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class for partner admin group create action.
 */
class PartnerAdminGroupCreateAction
{
    /**
     * @var BackendAdminAccessGroup
     */
    protected $model;

    /**
     * @param BackendAdminAccessGroup $backendAdminAccessGroup BackendAdminAccessGroup.
     */
    public function __construct(BackendAdminAccessGroup $backendAdminAccessGroup)
    {
        $this->model = $backendAdminAccessGroup;
    }

    /**
     * Show the form for creating a new resource.
     * @param BackEndApiMainController $contll     Controller.
     * @param array                    $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        DB::beginTransaction();
        try {
            //只提取当前登录管理员也拥有的权限
            $role = Arr::wrap(json_decode($inputDatas['role'], true));
            $role = array_intersect($contll->adminAccessGroupDetail, $role);

            //添加AdminGroup数据
            $objPartnerAdminGroup = $this->model;
            $objPartnerAdminGroup->fill(['group_name' => $inputDatas['group_name']]);
            $objPartnerAdminGroup->save();

            //添加AdminGroupDetails数据
            $data['group_id'] = $objPartnerAdminGroup->id;
            foreach ($role as $roleId) {
                $data['menu_id'] = $roleId;
                $groupDetailEloq = new BackendAdminAccessGroupDetail();
                $groupDetailEloq->fill($data);
                $groupDetailEloq->save();
            }

            $partnerMenuObj = new BackendSystemMenu();
            $partnerMenuObj->createMenuDatas($objPartnerAdminGroup->id, $role);

            DB::commit();
            return msgOut(true, $data);
        } catch (Exception $e) {
            DB::rollback();
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
    }
}
