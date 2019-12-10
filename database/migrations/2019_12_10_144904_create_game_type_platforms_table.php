<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateGameTypePlatformsTable
 */
class CreateGameTypePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'game_type_platforms',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->integer('platform_id')->nullable()->default(0)->comment('平台ID');
                $table->integer('type_id')->nullable()->default(0)->comment('分类ID')->unsigned();
                $table->string('device', 8)->nullable()->default(null)->comment('设备 app h5 pc');
                $table->integer('status')->nullable()->default(0)->comment('状态 0 禁用 1 启用');
                $table->nullableTimestamps();

                $table->foreign('type_id', 'fk_game_type_platforms_1')->references('id')->on('games_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('game_type_platforms');
    }
}
