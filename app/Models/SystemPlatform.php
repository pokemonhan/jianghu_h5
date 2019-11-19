<?php

namespace App\Models;

use App\Models\Admin\BackendAdminUser;
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
        return $this->hasMany(BackendAdminUser::class, 'platform_id', 'id');
    }
}
