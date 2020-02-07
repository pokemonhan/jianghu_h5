<?php

/** @var Factory $factory */

use App\Models\User\FrontendUser;
use Faker\Generator as Faker;
use Faker\Provider\zh_CN\PhoneNumber;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(
    FrontendUser::class,
    static function (Faker $faker) {
        $faker->addProvider(new PhoneNumber($faker));
        $redis  = app('redis_user_unique_id');
        $guid   = $redis->spop('test_' . config('web.main.frontend_user_unique_id'))[0];
        $result = [
                   'guid'          => $guid,
                   'mobile'        => $faker->phoneNumber,
                   'type'          => 1,
                   'platform_sign' => 'test',
                   'password'      => '$2y$10$FxBu/p5ky0D9LqEa5bwrKe9YXAYSWl2l7bvBKgwXlbeYipeLXERlq', // 12345Eth
                  ];
        return $result;
    },
);
