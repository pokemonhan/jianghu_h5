<?php

namespace App\Models;

use App\Models\Admin\MerchantAdminUser;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class for system platform.
 */
class SystemPlatform extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * @return HasMany
     */
    public function adminUsers(): HasMany
    {
        return $this->hasMany(MerchantAdminUser::class, 'platform_sign', 'sign');
    }

    public function owner()
    {
        return $this->hasOne(MerchantAdminUser::class, 'id', 'owner_id');
    }
}
