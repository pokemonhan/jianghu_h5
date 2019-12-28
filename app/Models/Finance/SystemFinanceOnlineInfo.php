<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

/**
 * Class SystemFinanceOnlineInfo
 * @package App\Models\Finance
 */
class SystemFinanceOnlineInfo extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public const ENCRYPT_MODE_SECRET = 1;
    public const ENCRYPT_MODE_CERT   = 2;
}
