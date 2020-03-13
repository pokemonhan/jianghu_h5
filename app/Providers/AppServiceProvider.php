<?php

namespace App\Providers;

use App\Game\GameIF;
use App\Models\Game\GameSubType;
use App\Models\Game\GameType;
use App\Models\User\FrontendUser;
use App\Observers\FrontendUserObserver;
use App\Observers\GameTypeChildObserver;
use App\Observers\GameTypeObserver;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Redis 0 database.
        $this->app->singleton(
            'redis_user_unique_id',
            static function () {
                $result = Redis::connection();
                return $result;
            },
        );
        $gameClass = Config::get('games_classes');
        if (empty($gameClass)) {
            return;
        }
        $gameClass = Arr::flatten($gameClass);
        if (empty($gameClass)) {
            return;
        }
        $this->app->tag($gameClass, GameIF::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * Usage: Model::whereLike('name', ['mike', 'joe'])->get();
         * Relationships: Model::whereLike('message.type', ['text', 'sms'])->get();
         */
        Builder::macro(
            'whereLike',
            function ($attributes, $terms): object {
                $this->where(
                    static function ($query) use ($attributes, $terms): void {
                        foreach (Arr::wrap($attributes) as $attribute) {
                            // If it's a single item, wrap the value in an array e.g. $term = [$term];
                            foreach (Arr::wrap($terms) as $term) {
                                // When whereLike contains a relationship.value, search the relationship value
                                $query->when(
                                    Str::contains($attribute, '.'),
                                    static function ($query) use ($attribute, $term): void {
                                        [
                                         $relationName,
                                         $relationAttribute,
                                        ] = explode('.', $attribute);
                                        // Validating if the relationship exists on the current query
                                        $query->orWhereHas(
                                            $relationName,
                                            static function ($query) use ($relationAttribute, $term): void {
                                                $query->where($relationAttribute, 'LIKE', '%' . $term . '%');
                                            },
                                        );
                                    },
                                    // A fallback for when the string DOES not contain a relationship
                                    static function ($query) use ($attribute, $term): void {
                                        $query->orWhere($attribute, 'LIKE', '%' . $term . '%');
                                    },
                                );
                            }
                        }
                    },
                );
                // Return the $query, so you can call other methods like ->get(), ->first(), ->where(), etc
                return $this;
            },
        );
        FrontendUser::observe(FrontendUserObserver::class);
        GameType::observe(GameTypeObserver::class);
        GameSubType::observe(GameTypeChildObserver::class);
    }
}
