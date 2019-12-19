<?php
namespace App\Http\SingleActions\Frontend\Common\GamesLobby;

use App\Models\Game\GameTypePlatform;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * Class GameCategoryAction
 * @package App\Http\SingleActions\Frontend\Common\GamesLobby
 */
class GameCategoryAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request): JsonResponse
    {
        $user = $request->user();
        $condition = [
            'status' => 1,
            'device' => 2,
            'platform_id' => $user->platform_id,
        ];

        $outputDatas = GameTypePlatform::where($condition)->with('gameType:id,name,sign,created_at')->first()->getRelation('gameType');
        return msgOut(true, $outputDatas);
    }
}