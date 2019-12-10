<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SystemEmailEvent
 * @package App\Events
 */
class SystemEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * 邮件id
     * @var integer
     */
    public $emailId;

    /**
     * 接收者类型
     * @var integer
     */
    public $receiverType;

    /**
     * 接收者
     * @var array
     */
    public $receivers;

    /**
     * 平台标识
     * @var string
     */
    public $platformSign;
    /**
     * SystemEmailEvent constructor.
     * @param integer $emailId      EmailId.
     * @param integer $receiverType ReceiverType.
     * @param array   $receivers    Receivers.
     * @param string  $platformSign PlatformSign.
     */
    public function __construct(int $emailId, int $receiverType, array $receivers, string $platformSign = '')
    {
        $this->emailId = $emailId;
        $this->receiverType = $receiverType;
        $this->receivers = $receivers;
        $this->platformSign = $platformSign;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
