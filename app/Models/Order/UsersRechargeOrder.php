<?php

namespace App\Models\Order;

use App\Models\BaseModel;

/**
 * Class UsersRechargeOrder
 * @package App\Models\Order
 */
class UsersRechargeOrder extends BaseModel
{
    
    /**
     * @var array
     */
    protected $guarded = ['id'];

    public const STATUS_INIT    = 0; //初始化的订单状态 线下订单代表 审核中 线上订单代表 未支付
    public const STATUS_SUCCESS = 1; //成功的订单状态 线下订单代表 审核通过 线上订单代表 已支付
    public const STATUS_REFUSE  = -1; //拒绝的订单状态 线下订单代表 审核拒绝 此状态线下仅有
    public const STATUS_EXPIRED = -2; //过期的订单状态

    public const EXPIRED = 15; //订单有效期 单位分钟
}
