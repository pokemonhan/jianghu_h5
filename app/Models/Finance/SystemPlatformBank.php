<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class  SystemPlatformBank
 * @package App\Models\Finance
 */
class SystemPlatformBank extends BaseModel
{

    /**
     * 开启状态
     * @var integer
     */
    public const STATUS_OPEN = 1;

    /**
     * 关闭状态
     * @var integer
     */
    public const STATUS_CLOSE = 0;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];
}
