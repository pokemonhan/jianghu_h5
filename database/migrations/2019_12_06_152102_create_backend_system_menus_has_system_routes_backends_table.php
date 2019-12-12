<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateBackendSystemMenusHasSystemRoutesBackendsTable
 */
class CreateBackendSystemMenusHasSystemRoutesBackendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'backend_system_menus_has_system_routes_backends',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->integer('menu_id')->nullable()->default(null)->comment('菜单ID');
                $table->integer('route_id')->nullable()->default(null)->comment('路由ID');
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
        Schema::dropIfExists('backend_system_menus_has_system_routes_backends');
    }
}
