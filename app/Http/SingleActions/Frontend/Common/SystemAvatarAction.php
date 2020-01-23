<?php

namespace App\Http\SingleActions\Frontend\Common;

use App\Http\Resources\Frontend\System\SystemAvatarResource;
use App\Models\Systems\SystemUserPublicAvatar;
use Illuminate\Http\JsonResponse;

/**
 * Class SystemAvatarAction
 * @package App\Http\SingleActions\Common\FrontendUser
 */
class SystemAvatarAction
{
    /**
     * System avatar list.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(): JsonResponse
    {
        $item   = SystemUserPublicAvatar::get(['id', 'pic_path']);
        $result = msgOut(SystemAvatarResource::collection($item));
        return $result;
    }
}
