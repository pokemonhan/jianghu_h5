<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

/**
 * Class for marchant admin access group.
 */
class MerchantAdminAccessGroup extends BaseModel
{
    public const IS_SUPER = 1;
    public const NO_SUPER = 0;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * 管理员组权限
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail()
    {
        return $this->hasMany(MerchantAdminAccessGroupsHasBackendSystemMenu::class, 'group_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adminUsers()
    {
        return $this->hasMany(MerchantAdminUser::class, 'group_id', 'id');
    }
}
