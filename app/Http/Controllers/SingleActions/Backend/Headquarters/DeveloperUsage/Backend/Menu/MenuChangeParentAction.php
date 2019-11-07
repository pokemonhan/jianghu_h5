<?php

namespace App\Http\Controllers\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Illuminate\Http\JsonResponse;

/**
 * Class for menu change parent action.
 */
class MenuChangeParentAction
{
    /**
     * @var BackendSystemMenu
     */
    protected $model;

    /**
     * @param BackendSystemMenu $backendSystemMenu Model.
     */
    public function __construct(BackendSystemMenu $backendSystemMenu)
    {
        $this->model = $backendSystemMenu;
    }

    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $parseDatas = json_decode($inputDatas['dragResult'], true);
        $itemProcess = [];
        if (!empty($parseDatas)) {
            $itemProcess = $this->model->changeParent($parseDatas);
            return msgOut(true, $itemProcess);
        } else {
            return msgOut(false);
        }
    }
}
