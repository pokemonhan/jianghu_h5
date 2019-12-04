<?php

namespace App\Models\Systems;

use App\Models\BaseModel;

/**
 * Class for system domain.
 */
class SystemDomain extends BaseModel
{
    /**
     * 状态开启
     * @var integer
     */
    public const STATUS_OPEN = 1;

    /**
     * 状态关闭
     * @var integer
     */
    public const STATUS_CLOSE = 0;

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];
}
