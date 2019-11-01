<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Usage: Model::whereLike('name', ['mike', 'joe'])->get();
         * Relationships: Model::whereLike('message.type', ['text', 'sms'])->get();
         */
        Builder::macro('whereLike', function ($attributes, $terms) {
            $this->where(static function ($query) use ($attributes, $terms) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    // If it's a single item, wrap the value in an array e.g. $term = [$term];
                    foreach (Arr::wrap($terms) as $term) {
                        // When whereLike contains a relationship.value, search the relationship value
                        $query->when(Str::contains($attribute, '.'),
                            static function ($query) use ($attribute, $term) {
                                [$relationName, $relationAttribute] = explode('.', $attribute);
                                // Validating if the relationship exists on the current query
                                $query->orWhereHas($relationName, function ($query) use ($relationAttribute, $term) {
                                    $query->where($relationAttribute, 'LIKE', "%{$term}%");
                                });
                            },
                            // A fallback for when the string DOES not contain a relationship
                            static function ($query) use ($attribute, $term) {
                                $query->orWhere($attribute, 'LIKE', "%{$term}%");
                            }
                        );
                    }
                }
            });
            // Return the $query, so you can call other methods like ->get(), ->first(), ->where(), etc
            return $this;
        });
    }
}
