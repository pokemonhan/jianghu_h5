<?php

use App\Models\User\FrontendUser;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class FrontendUsersSpecificInfoSeeder
 */
class FrontendUsersSpecificInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create('zh_CN');
        FrontendUser::all()->map(function ($item) use($faker) {
            $item->specificInfo()->create([
                'email' => $faker->email,
                'avatar' => 1,
                'nickname' => $faker->firstNameFemale . $faker->titleFemale
            ]);
        });
    }
}
