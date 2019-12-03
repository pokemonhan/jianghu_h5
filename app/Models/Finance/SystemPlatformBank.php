<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class  SystemPlatformBank
 * @package App\Models\Finance
 */
class SystemPlatformBank extends BaseModel
{
    public static const STATUS_OPEN = 1;
    public static const STATUS_CLOSE = 0;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];
}
