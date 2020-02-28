<?php

use App\Models\User\FrontendUserLevel;
use Illuminate\Database\Seeder;

/**
 * Class FrontendUserLevelsSeeder
 */
class FrontendUserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FrontendUserLevel::insert(
            [
             [
              'level'          => 1,
              'platform_sign'  => 'jhhy',
              'experience_min' => 1000,
              'experience_max' => 1999,
              'grade_gift'     => 5.88,
              'week_gift'      => 5.88,
             ],
             [
              'level'          => 2,
              'platform_sign'  => 'jhhy',
              'experience_min' => 2000,
              'experience_max' => 2999,
              'grade_gift'     => 10.88,
              'week_gift'      => 10.88,
             ],
             [
              'level'          => 3,
              'platform_sign'  => 'jhhy',
              'experience_min' => 3000,
              'experience_max' => 3999,
              'grade_gift'     => 15.88,
              'week_gift'      => 15.88,
             ],
             [
              'level'          => 4,
              'platform_sign'  => 'jhhy',
              'experience_min' => 4000,
              'experience_max' => 4999,
              'grade_gift'     => 20.88,
              'week_gift'      => 20.88,
             ],
             [
              'level'          => 5,
              'platform_sign'  => 'jhhy',
              'experience_min' => 5000,
              'experience_max' => 5999,
              'grade_gift'     => 25.88,
              'week_gift'      => 25.88,
             ],
             [
              'level'          => 6,
              'platform_sign'  => 'jhhy',
              'experience_min' => 6000,
              'experience_max' => 6999,
              'grade_gift'     => 30.88,
              'week_gift'      => 30.88,
             ],
             [
              'level'          => 7,
              'platform_sign'  => 'jhhy',
              'experience_min' => 7000,
              'experience_max' => 7999,
              'grade_gift'     => 35.88,
              'week_gift'      => 35.88,
             ],
            ],
        );
    }
}
