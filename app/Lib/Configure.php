<?php namespace App\Lib;

use App\Models\Admin\SystemConfiguration;
use Illuminate\Support\Facades\Cache;

/**
 * Class Configure
 *
 * @package App\Lib
 */
class Configure
{
    /**
     * system_configurations
     *
     * @param  string      $configKey ConfigureKey.
     * @param  string|null $default   Value.
     * @return mixed
     */
    public function getData(string $configKey, ?string $default = null)
    {
        $tags = self::getTags();
        return Cache::tags($tags)->get(
            $configKey,
            static function () use (
                $configKey,
                $default,
                $tags
            ) {
                $result = SystemConfiguration::where('sign', '=', $configKey)->where('status', '=', 1)->first();
                if ($result !== null) {
                    Cache::tags($tags)->forever($configKey, $result->value);
                    return $result->value;
                } else {
                    return $default;
                }
            },
        );
    }

    /**
     * Setting Data into the Config
     *
     * @param string $configKey Config  Key.
     * @param string $value     Value.
     * @return void
     */
    public static function setData(string $configKey, string $value): void
    {
        $tags = self::getTags();
        SystemConfiguration::where('sign', '=', $configKey)->update(['value' => $value]);
        Cache::tags($tags)->forget($configKey);
    }

    /**
     * clean the cache
     *
     * @return void
     */
    public function flush(): void
    {
        $tags = self::getTags();
        Cache::tags($tags)->flush();
    }

    /**
     * get Tag name
     *
     * @return string
     */
    public static function getTags(): string
    {
        return 'configure';
    }
}
