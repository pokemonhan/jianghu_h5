<?php

namespace App\Models\DeveloperUsage\Merchant;

use App\Models\BaseModel;
use App\Models\DeveloperUsage\Menu\MerchantSystemMenu;

/**
 * Class for system routes merchant.
 */
class SystemRoutesMerchant extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(MerchantSystemMenu::class, 'menu_group_id', 'id');
    }
}
