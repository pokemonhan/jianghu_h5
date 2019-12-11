<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateFrontendUsersAccountsTypesParamsTable
 */
class CreateFrontendUsersAccountsTypesParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'frontend_users_accounts_types_params',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('label', 32)->nullable()->default(null)->comment('名称');
                $table->string('param', 32)->nullable()->default(null)->comment('参数');
                $table->unsignedTinyInteger('compatible')->nullable()->default('1')->comment('1兼容两张表都存在数据');
                $table->nullableTimestamps();
            },
        );
        DB::statement("ALTER TABLE `frontend_users_accounts_types_params` comment '帐变类型所需字段'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_users_accounts_types_params');
    }
}
