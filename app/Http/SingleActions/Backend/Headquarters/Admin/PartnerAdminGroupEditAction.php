<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Models\Admin\BackendAdminAccessGroup;
use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class for partner admin group edit action.
 */
class PartnerAdminGroupEditAction
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
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $id = $inputDatas['id'];
        $datas = $this->model::find($id);
        if ($datas !== null) {
            DB::beginTransaction();
            $datas->group_name = $inputDatas['group_name'];
            $datas->role = $inputDatas['role'];
            try {
                $datas->save();
                //更新管理员组菜单缓存
                $this->updateGroupMenu($datas);
                DB::commit();
                return msgOut(true, $datas->toArray());
            } catch (Exception $e) {
                DB::rollBack();
                return msgOut(false, [], $e->getCode(), $e->getMessage());
            }
        } else {
            return msgOut(false, [], '100200');
        }
    }

    /**
     * 更新管理员组菜单缓存
     *
     * @param BackendAdminAccessGroup $accessGroupEloq BackendAdminAccessGroup.
     * @return void
     */
    public function updateGroupMenu(BackendAdminAccessGroup $accessGroupEloq): void
    {
        $role = json_decode($accessGroupEloq->role); //[1,2,3,4,5]
        $backendSystemMenuEloq = new BackendSystemMenu();
        $backendSystemMenuEloq->createMenuDatas($accessGroupEloq->id, $role);
    }
}
