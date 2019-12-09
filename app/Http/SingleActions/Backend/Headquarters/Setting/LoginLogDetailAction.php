<?php

namespace App\Http\SingleActions\Backend\Headquarters\Setting;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\ModelFilters\System\BackendLoginLogFilter;
use App\Models\Systems\BackendLoginLog;
use Illuminate\Http\JsonResponse;

/**
 * 管理员登录日志
 */
class LoginLogDetailAction
{

    /**
     * Comment
     * @var BackendLoginLog
     */
    protected $model;

    /**
     * @param BackendLoginLog $backendLoginLog 管理员登陆日志.
     */
    public function __construct(BackendLoginLog $backendLoginLog)
    {
        $this->model = $backendLoginLog;
    }

    /**
     * @param BackEndApiMainController $contll     Contll.
     * @param array                    $inputDatas 接收的参数.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        $data = $this->model::filter($inputDatas, BackendLoginLogFilter::class)->paginate($contll->pageSize);
        return msgOut(true, $data);
    }
}
