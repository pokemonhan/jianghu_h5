<?php

namespace App\Http\SingleActions\Backend\Merchant\Finance\Online;

use App\Models\Order\UsersRechargeOrder;
use App\Services\FactoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class CallbackAction
 * @package App\Http\SingleActions\Backend\Merchant\Finance\Online
 */
class CallbackAction
{

    /**
     * 接收的回调数据
     *
     * @var mixed $inputDatas;
     */
    protected $inputDatas;

    /**
     * 请求的ip
     *
     * @var string $remoteIp
     */
    protected $remoteIp;

    /**
     * 订单号
     *
     * @var string $order
     */
    protected $order;

    /**
     * 系统的平台
     *
     * @var string $platform
     */
    protected $platform;

    /**
     * 回调订单的详情
     *
     * @var UsersRechargeOrder $orderInfo
     */
    protected $orderInfo;

    /**
     * CallbackAction constructor.
     * @param Request $request Request.
     */
    public function __construct(Request $request)
    {
        $this->inputDatas = $request->input();
        $this->remoteIp   = $request->ip();
    }

    /**
     * @param string $platform Platform.
     * @param string $order    Order.
     * @return string
     */
    public function execute(string $platform, string $order): string
    {
        $this->order    = $order;
        $this->platform = $platform;
        Log::channel('finance-callback-data')
            ->info(['orderNo' => $order, 'msg' => '回调参数', 'data' => $this->inputDatas]);
        try {
            $result = $this->_preVerify();
            if (!$result) {
                return '403';
            }
            $vendor  = $this->orderInfo->onlineInfo->channel->vendor->sign; //第三方厂商
            $channel = $this->orderInfo->onlineInfo->channel->sign; //通道
            $result  = FactoryService::getInstence()->generatePay($vendor, $channel)
                ->setPreDataOfVerify($order)->verify($this->inputDatas);
            //如果第三方返回的金额大于本系统的订单金额, 对不起, 为了安全, 按掉单处理.
            if ($result['realMoney'] > $this->orderInfo->money) {
                Log::channel('finance-callback-system')
                    ->info(['orderNo' => $this->order, 'msg' => '回调的上分金额大于订单金额']);
                return $result['backStr'];
            }
            if ($result['flag']) {
                DB::beginTransaction();
                $this->orderInfor->status     = UsersRechargeOrder::STATUS_SUCCESS;
                $this->orderInfo->real_money  = $result['realMoney'];
                $this->orderInfo->platform_no = $result['merchantOrderNo'];
                $saveRes                      = $this->orderInfo->save();
                if ($saveRes) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }
            }
            return $result['backStr'];
        } catch (\Throwable $exception) {
            DB::rollBack();
        }
    }

    /**
     * 验证签名前检验
     *
     * @return boolean
     */
    private function _preVerify(): bool
    {
        //检测回调参数是否正常
        if (empty($this->inputDatas)) {
            Log::channel('finance-callback-system')
                ->info(['orderNo' => $this->order, 'msg' => '回调参数异常,没有收到对方的参数!', 'data' => '']);
            return false;
        }
        $order = UsersRechargeOrder::where('platform_sign', $this->platform)->where('order_no', $this->order)->first();
        //检测订单是否正常
        if (!$order) {
            Log::channel('finance-callback-system')
                ->info(['orderNo' => $this->order, 'msg' => '找不到对应的订单信息', 'data' => '']);
            return false;
        }
        //如果订单状态不等于订单初始化时的状态, 对不起, 为了避免重复上分, 程序就此打住.
        if ((int) $order->status !== UsersRechargeOrder::STATUS_INIT) {
            Log::channel('finance-callback-system')
                ->info(['orderNo' => $this->order, 'msg' => '该订单已关闭!', 'data' => $order]);
            return false;
        }
        $whiteListIps = json_decode($order->onlineInfo->channel->vendor->whitelist_ips, true);
        //检测ip是否在自己厂商的ip白名单内
        if (empty($whiteListIps) || !in_array($this->remoteIp, $whiteListIps)) {
            Log::channel('finance-callback-system')
                ->info(
                    [
                        'orderNo' => $this->order,
                        'msg' => 'IP不在白名单内!',
                        'data' => ['remoteIp' => $this->remoteIp, 'whiteListIps' => $whiteListIps],
                    ],
                );
            return false;
        }
        $this->orderInfo = $order;
        return true;
    }
}
