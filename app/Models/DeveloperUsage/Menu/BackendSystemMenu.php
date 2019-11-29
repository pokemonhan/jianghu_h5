<?php

namespace App\Models\DeveloperUsage\Menu;

use App\Models\BaseModel;
use App\Models\DeveloperUsage\Menu\Traits\MenuLogics;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class for backend system menu.
 */
class BackendSystemMenu extends BaseModel
{
    use MenuLogics;

    /**
     * @var string
     */
    public const ALL_MENU_REDIS_KEY = '1';

    /**
     * @var string
     */
    protected $redisFirstTag = 'ms_menu';

    /**
     * @return HasMany
     */
    public function childs(): HasMany
    {
        return $this->hasMany(__CLASS__, 'pid', 'id');
    }
}
