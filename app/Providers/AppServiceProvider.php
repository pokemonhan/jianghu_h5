<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
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
    public function register()
    {
        //temporary empty
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
            function ($attributes, $terms): void {
                $this->where(
                    static function ($query) use ($attributes, $terms): void {
                        foreach (Arr::wrap($attributes) as $attribute) {
                            // If it's a single item, wrap the value in an array e.g. $term = [$term];
                            foreach (Arr::wrap($terms) as $term) {
                                // When whereLike contains a relationship.value, search the relationship value
                                $query->when(
                                    Str::contains($attribute, '.'),
                                    static function ($query) use ($attribute, $term): void {
                                        [$relationName, $relationAttribute] = explode('.', $attribute);
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
    }

    /**
     * Format duration.
     *
     * @param float $seconds
     *
     * @return string
     */
    private function formatDuration($seconds): string
    {
        if ($seconds < 0.001) {
            $result = round($seconds * 1000000) . 'μs';
        } elseif ($seconds < 1) {
            $result = round($seconds * 1000, 2) . 'ms';
        }else {
            $result = round($seconds, 2) . 's';
        }
        return $result;
    }
}
