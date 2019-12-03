<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class  SystemPlatformBank
 * @package App\Models\Finance
 */
class SystemPlatformBank extends BaseModel
{
    static const STATUS_OPEN = 1;
    static const STATUS_CLOSE = 0;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];
}
