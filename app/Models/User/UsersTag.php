<?php

namespace App\Models\User;

use App\Models\BaseAuthModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class UsersTag
 * @package App\Models\User
 */
class UsersTag extends BaseAuthModel
{

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * 标签下的会员
     * @return HasMany
     */
    public function user(): HasMany
    {
        $users = $this->hasMany(FrontendUser::class, 'user_tag_id', 'id');
        return $users;
    }
}
