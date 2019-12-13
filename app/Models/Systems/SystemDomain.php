<?php

namespace App\Models\Systems;

use App\Models\BaseModel;
use App\Models\Systems\Traits\SystemDomainLogics;

/**
 * Class for system domain.
 */
class SystemDomain extends BaseModel
{

    use SystemDomainLogics;

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
     * 主域名类型
     */
    public const TYPE_MAIN = 0;

    /**
     * PC域名类型
     */
    public const TYPE_PC = 1;

    /**
     * H5域名类型
     */
    public const TYPE_H5 = 2;

    /**
     * APP域名类型
     */
    public const TYPE_APP = 3;

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * 域名类型的前缀
     * @var array
     */
    public $typePrefix = [
        0 => '',
        1 => 'www.',
        2 => 'm.',
        3 => 'app.',
    ];
}
