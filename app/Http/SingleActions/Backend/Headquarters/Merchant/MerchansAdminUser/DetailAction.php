<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\MerchansAdminUser;

use App\Models\SystemPlatform;
use Illuminate\Http\JsonResponse;

/**
 * Class for merchant admin user do add action.
 */
class DetailAction
{
    /**
     * @var SystemPlatform
     */
    private $model;

    /**
     * @param SystemPlatform $systemPlatform 代理商平台.
     */
    public function __construct(SystemPlatform $systemPlatform)
    {
        $this->model = $systemPlatform;
    }

    /**
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        $platformData = $this->model->with('owner')->get()->toArray();
        return msgOut(true, $platformData);
    }
}
