<?php

namespace App\Game;

use App\Http\SingleActions\MainAction;

/**
 * 对接游戏的契约
 *
 * Interface Game
 * @package App\Game\Core
 */
interface GameIF
{

    /**
     * 进入游戏.
     *
     * @param \App\Models\Game\Game $gameObj   GameObj.
     * @param MainAction            $systemObj MainAction Datas.
     * @return mixed[]
     */
    public function game(\App\Models\Game\Game $gameObj, MainAction $systemObj): array;

    /**
     * 上分.
     *
     * @return boolean
     */
    public function upScore(): bool;

    /**
     * 下分.
     *
     * @return boolean
     */
    public function downScore(): bool;

    /**
     * 检查用户余额.
     *
     * @return float
     */
    public function checkBalance(): float;

    /**
     * 检查用户上下分订单是否成功.
     *
     * @return boolean
     */
    public function checkOrder(): bool;

    /**
     * 保存用户在第三方平台的打码注单.
     *
     * @return void
     */
    public function saveBetOrder(): void;

    /**
     * 创建用户有些三方需要此操作 没有需要此操作返回 true
     * @return boolean
     */
    public function createAccount(): bool;
}
