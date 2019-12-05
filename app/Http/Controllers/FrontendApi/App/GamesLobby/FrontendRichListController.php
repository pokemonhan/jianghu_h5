<?php

namespace App\Http\Controllers\FrontendApi\App\GamesLobby;

use App\Http\SingleActions\Frontend\App\GamesLobby\RichListAction;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\FrontendApi\FrontendApiMainController;

/**
 * Class FrontendRichListController
 * @package App\Http\Controllers\FrontendApi\App\GamesLobby
 */
class FrontendRichListController extends FrontendApiMainController
{
    /**
     * 今日富豪榜.
     * @param RichListAction $action Action.
     * @return JsonResponse.
     * @throws \Exception Exception.
     */
    public function richList(RichListAction $action): JsonResponse
    {
        return $action->execute();
    }
}
