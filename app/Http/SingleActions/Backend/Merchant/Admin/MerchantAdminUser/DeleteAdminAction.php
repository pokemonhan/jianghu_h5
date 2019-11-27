<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Models\Admin\MerchantAdminUser;
use App\Models\Admin\MerchantAdminAccessGroup;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class for delete admin action.
 */
class DeleteAdminAction
{
    /**
     * @var object
     */
    protected $model;

    /**
     * @param MerchantAdminUser $merchantAdminUser MerchantAdminUser.
     */
    public function __construct(MerchantAdminUser $merchantAdminUser)
    {
        $this->model = $merchantAdminUser;
    }

    /**
     * 删除管理员
     * @param MerchantApiMainController $contll     Controller.
     * @param array                     $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(MerchantApiMainController $contll, array $inputDatas): JsonResponse
    {
        $adminEloq = $this->model->find($inputDatas['id']);
        if ($adminEloq !== null) {
            if ($adminEloq->platform_sign !== $contll->currentPlatformEloq->sign) {
                throw new \Exception('300703');
            }
            if ($adminEloq->accessGroup->is_super === MerchantAdminAccessGroup::IS_SUPER) {
                throw new \Exception('300704');
            }
            if ($adminEloq->remember_token !== null) {
                try {
                    JWTAuth::setToken($adminEloq->remember_token);
                    JWTAuth::invalidate();
                } catch (JWTException $e) {
                    Log::info($e->getMessage());
                }
            }
            try {
                $adminEloq->delete();
                return msgOut(true);
            } catch (Exception $e) {
                return msgOut(false, [], $e->getCode(), $e->getMessage());
            }
        } else {
            throw new \Exception('300701');
        }
    }
}
