<?php

namespace App\Models\Admin;

use App\Models\SystemPlatform;
use App\Models\BaseAuthModel;

/**
 * Class for marchant admin user.
 */
class MerchantAdminUser extends BaseAuthModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    /**
     * 平台
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function platform()
    {
        return $this->hasOne(SystemPlatform::class, 'sign', 'platform_sign');
    }

    /**
     * 角色组
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accessGroup()
    {
        return $this->hasOne(MerchantAdminAccessGroup::class, 'id', 'group_id');
    }
}
