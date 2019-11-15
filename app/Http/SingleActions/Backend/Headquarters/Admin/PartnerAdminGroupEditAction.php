<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Models\Admin\BackendAdminAccessGroup;
use App\Models\DeveloperUsage\Backend\BackendAdminAccessGroupDetail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
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
     * @param BackEndApiMainController $contll     Controller.
     * @param array                    $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        $id = $inputDatas['id'];
        if ((int) $id === 1) {
            return msgOut(false, [], '300101');
        }

        $datas = $this->model::find($id);
        if ($datas !== null) {
            DB::beginTransaction();
            try {
                $datas->group_name = $inputDatas['group_name'];
                $datas->save();

                BackendAdminAccessGroupDetail::where('group_id', $id)->delete();

                //只提取当前登录管理员也拥有的权限
                $role = Arr::wrap(json_decode($inputDatas['role'], true));
                $role = array_intersect($contll->adminAccessGroupDetail, $role);

                //添加AdminGroupDetails数据
                $data['group_id'] = $id;
                foreach ($role as $roleId) {
                    $data['menu_id'] = $roleId;
                    $groupDetailEloq = new BackendAdminAccessGroupDetail();
                    $groupDetailEloq->fill($data);
                    $groupDetailEloq->save();
                }

                DB::commit();
                return msgOut(true, $datas->toArray());
            } catch (Exception $e) {
                DB::rollBack();
                return msgOut(false, [], $e->getCode(), $e->getMessage());
            }
        } else {
            return msgOut(false, [], '300100');
        }
    }
}
