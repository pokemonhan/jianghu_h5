<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                SystemDynActivitySeeder::class,
                BackendAdminAccessGroupSeeder::class,
                BackendAdminAccessGroupDetailSeeder::class,
                BackendAdminUserSeeder::class,
                BackendSystemMenuSeeder::class,
                FrontendUserSeeder::class,
                FrontendUserAccountSeeder::class,
                FrontendUserAccountTypeSeeder::class,
                FrontendUserAccountTypeParamSeeder::class,
                FrontendUserSpecificInfoSeeder::class,
                MerchantSystemMenuSeeder::class,
                SystemRoutesMerchantSeeder::class,
                SystemRoutesBackendSeeder::class,
                SystemRoutesWebSeeder::class,
            ],
        );
    }
}
