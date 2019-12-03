<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class  SystemBank
 * @package App\Models\Finance
 */
class SystemBank extends BaseModel
{
    /**
     * @var integer
     */
    public const STATUS_OPEN = 1;
    /**
     * @var integer
     */
    public const STATUS_CLOSE = 0;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];
}
