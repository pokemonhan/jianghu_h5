<?php

namespace App\Models\Game;

use App\Models\BaseModel;

class GameVendorPlatform extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var integer
     */
    public const DEVICE_H5 = 2;
    /**
     * @var integer
     */
    public const DEVICE_APP = 3;
    /**
     * @var integer
     */
    public const DEVICE_PC = 1;

    /**
     * @return mixed
     */
    public function gameVendor()
    {
        return $this->belongsTo(GamesVendor::class, 'vendor_id', 'id');
    }
}
