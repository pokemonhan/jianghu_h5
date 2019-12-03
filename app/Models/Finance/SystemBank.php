<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class  SystemBank
 * @package App\Models\Finance
 */
class SystemBank extends BaseModel
{
    public const STATUS_OPEN = 1;
    public const STATUS_CLOSE = 0;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];
}
