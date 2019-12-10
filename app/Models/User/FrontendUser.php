<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use App\Models\BaseAuthModel;

/**
 * Class FrontendUser
 * @package App\Models\User
 */
class FrontendUser extends BaseAuthModel
{

    use Notifiable;

    /**
     * @var TYPE_TOP_AGENT
     */
    public const TYPE_TOP_AGENT = 1;
    /**
     * @var TYPE_AGENT
     */
    public const TYPE_AGENT = 2;
    // 没用到  暂时注释
    // const TYPE_USER = 3;
    public const FROZEN_TYPE_NO_WITHDRAWAL = 3;

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'fund_password', 'mobile',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'register_time' => 'datetime',
        'last_login_time' => 'datetime',
    ];

    /**
     * 找子级
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }

    /**
     * 用户上级
     * @return HasOne
     */
    public function parent(): HasOne
    {
        return $this->hasOne($this, 'id', 'parent_id');
    }

    /**
     *  用户账户
     * @return HasOne
     */
    public function account(): HasOne
    {
        return $this->hasOne(FrontendUsersAccount::class, 'user_id', 'id');
    }

    /**
     *  specific info
     * @return HasOne
     */
    public function specificInfo(): HasOne
    {
        return $this->hasOne(FrontendUsersSpecificInfo::class, 'user_id', 'id');
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['mobile_hidden'];

    /**
     * 隐藏手机号中间四位 ****
     * @return string
     */
    public function getMobileHiddenAttribute(): string
    {
        return substr_replace($this->attributes['mobile'], '****', 3, 4);
    }
}
