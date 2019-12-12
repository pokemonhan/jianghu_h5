<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSystemRoutesMerchantsTable
 */
class CreateSystemRoutesMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'system_routes_merchants',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('route_name', 64)->nullable()->default(null)->comment('路由名称');
                $table->string('controller', 128)->nullable()->default(null)->comment('控制器');
                $table->string('method', 64)->nullable()->default(null)->comment('方法');
                $table->integer('menu_group_id')->nullable()->default(null)->comment('菜单ID');
                $table->string('title', 45)->nullable()->default(null)->comment('标题');
                $table->text('description')->nullable()->default(null)->comment('描述');
                $table->tinyInteger('is_open')->nullable()->default(null)->comment('0封闭式 1开放式');
                $table->nullableTimestamps();
            },
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_routes_merchants');
    }
}
