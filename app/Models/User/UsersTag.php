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

    public function user(): HasMany
    {
    	return $this->hasMany(FrontendUser::class, 'user_tag_id', 'id');
    }
}
