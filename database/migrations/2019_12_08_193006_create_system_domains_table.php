<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateSystemDomainsTable
 */
class CreateSystemDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'system_domains',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('platform_sign', 64)->nullable()->default(null)->comment('平台标识');
                $table->integer('admin_id')->nullable()->default(null)->comment('管理员id');
                $table->string('domain')->nullable()->default(null)->comment('域名');
                $table->tinyInteger('status')->default('1')->comment('是否启用,默认启用');
                $table->nullableTimestamps();
            },
        );
        DB::statement("ALTER TABLE `system_domains` comment '代理商域名管理 changes from backend_domains'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_domains');
    }
}
