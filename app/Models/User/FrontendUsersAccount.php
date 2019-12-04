<?php

namespace App\Models\User;

use App\Models\BaseAuthModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FrontendUsersAccount extends BaseAuthModel
{
    /**
     * 用户信息
     * @return BelongsTo
     */
    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class,'user_id','id');
    }
}
