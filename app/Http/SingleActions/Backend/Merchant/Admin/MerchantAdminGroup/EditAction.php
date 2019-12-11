<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminGroup;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Models\Admin\MerchantAdminAccessGroup;
use App\Models\Admin\MerchantAdminAccessGroupsHasBackendSystemMenu;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class for edit action.
 */
class EditAction
{
    /**
     * @var MerchantAdminAccessGroup
     */
    protected $model;

    /**
     * @param MerchantAdminAccessGroup $merchantAdminAccessGroup MerchantAdminAccessGroup.
     */
    public function __construct(MerchantAdminAccessGroup $merchantAdminAccessGroup)
    {
        $this->model = $merchantAdminAccessGroup;
    }

    /**
     * @param  MerchantApiMainController $contll     Controller.
     * @param  array                     $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(MerchantApiMainController $contll, array $inputDatas): JsonResponse
    {
        $adminGroupELoq = $this->model::find($inputDatas['id']);
        if ($adminGroupELoq !== null) {
            if ($adminGroupELoq->is_super === 1) {
                throw new \Exception('300101');
            }
            DB::beginTransaction();
            try {
                $adminGroupELoq->group_name = $inputDatas['group_name'];
                $adminGroupELoq->save();

                MerchantAdminAccessGroupsHasBackendSystemMenu::where('group_id', $inputDatas['id'])->delete();

                //只提取当前登录管理员也拥有的权限
                $role = Arr::wrap(json_decode($inputDatas['role'], true));
                $role = array_intersect($contll->adminAccessGroupDetail, $role);

                //添加AdminGroupDetails数据
                $data['group_id'] = $inputDatas['id'];
                foreach ($role as $roleId) {
                    $data['menu_id'] = $roleId;
                    $groupDetailEloq = new MerchantAdminAccessGroupsHasBackendSystemMenu();
                    $groupDetailEloq->fill($data);
                    $groupDetailEloq->save();
                }

                DB::commit();
                return msgOut(true, $adminGroupELoq->toArray());
            } catch (Exception $e) {
                DB::rollBack();
                return msgOut(false, [], $e->getCode(), $e->getMessage());
            }
        } else {
            throw new \Exception('300100');
        }
    }
}
