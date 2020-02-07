<?php

/** @var Factory $factory */

use App\Models\User\FrontendUsersSpecificInfo;
use Faker\Generator as Faker;
use Faker\Provider\zh_CN\Person;
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
$factory->define(FrontendUsersSpecificInfo::class, function (Faker $faker) {
    $faker->addProvider(new Person($faker));
    return [
        'avatar' => 1,
        'nickname' => $faker->firstNameFemale . $faker->titleFemale,
    ];
});
