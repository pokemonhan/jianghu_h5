<?php

namespace App\ModelFilters\System;

use EloquentFilter\ModelFilter;

/**
 * Class SystemSmsConfigFilter
 *
 * @package App\ModelFilters\Game
 */
class SystemSmsConfigFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [
                         'admin' => ['name'],
                        ];

    /**
     * 修改时间查询
     *
     * @param  array $updatedAt 修改时间.
     * @return $this
     */
    public function updatedAt(array $updatedAt): SystemSmsConfigFilter
    {
        $eloq = $this;
        if (count($updatedAt) === 2) {
            $eloq = $this->whereBetween('updated_at', $updatedAt);
        }
        return $eloq;
    }

    /**
     * 状态查询
     *
     * @param integer $status 状态.
     * @return $this
     */
    public function status(int $status): SystemSmsConfigFilter
    {
        $eloq = $this->where('status', $status);
        return $eloq;
    }
}
