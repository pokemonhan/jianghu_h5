<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class for menu delete action.
 */
class DeleteAction
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
        $toDelete = $inputDatas['toDelete'];
        if (!empty($toDelete)) {
            try {
                $datas = $this->model->find($toDelete)->each(static function ($product) {
                    $data[] = $product->toArray();
                    $product->delete();
                    return $data;
                });
                $this->model->refreshStar();
                return msgOut(true, $datas);
            } catch (Exception $e) {
                return msgOut(false, [], '0002', $e->getMessage());
            }
        } else {
            return msgOut(false);
        }
    }
}
