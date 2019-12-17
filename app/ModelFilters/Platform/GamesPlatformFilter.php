<?php 

namespace App\ModelFilters\Platform;

use EloquentFilter\ModelFilter;

/**
 * Class GamesPlatformFilter
 * @package App\ModelFilters\Platform
 */
class GamesPlatformFilter extends ModelFilter
{

    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [
        'games' => ['name'],
        'vendor' => ['vendor_id'],
        'type' => ['type_id'],
    ];

    /**
     * @param string $platform_sign PlatformSign.
     * @return object
     */
    public function platformSign(string $platform_sign): object
    {
        return $this->where('platform_sign', $platform_sign);
    }

    /**
     * @param integer $device Device.
     * @return object
     */
    public function device(int $device): object
    {
        return $this->where('device', $device);
    }

    /**
     * @param integer $status Status.
     * @return object
     */
    public function status(int $status): object
    {
        return $this->where('status', $status);
    }
}
