<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use App\Models\Game\GamesType;
use App\Models\Game\GamesVendor;
use Illuminate\Http\JsonResponse;

/**
 * Class GetSearchConditionAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class GetSearchConditionAction extends BaseAction
{
   /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute() :JsonResponse
    {
        $games = $this->model->select(['id', 'type_id', 'vendor_id', 'name'])->get();
        $vendors = (new GamesVendor())->select(['id', 'name'])->get();
        $types = (new GamesType())->select(['id', 'name'])->get();
        return msgOut(
            true,
            [
               'games' => $games,
               'vendors' => $vendors,
               'types' => $types,
            ],
            '200',
            '获取成功',
        );
    }
}
