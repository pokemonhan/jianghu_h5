<?php
namespace App\Http\SingleActions\Frontend\App\GamesLobby;

use App\Models\User\FrontendUser;
use App\Models\User\FrontendUsersAccount;
use Illuminate\Http\JsonResponse;

class RichListAction
{
   /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
   public function execute(): JsonResponse
   {
       $outputDatas = FrontendUsersAccount::with('frontendUser.specificInfo:user_id,mobile')->orderBy('balance','desc')->limit(3)->get();
       return msgOut(true, $outputDatas);
   }
}