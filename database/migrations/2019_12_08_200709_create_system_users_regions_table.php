<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUsersRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_users_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->collation = 'utf8mb4_0900_ai_ci';
            $table->string('region_id', 16)->nullable()->default(null)->comment('行政区域编码');
            $table->string('region_parent_id', 16)->nullable()->default(null)->comment('上级行政区域编码');
            $table->string('region_name', 64)->nullable()->default(null)->comment('名称');
            $table->tinyInteger('region_level')->nullable()->default(null)->comment('1.省 2.市(市辖区)3.县(区、市)4.镇(街道)');
            $table->nullableTimestamps();
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `system_users_regions` comment '行政区域'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_users_regions');
    }
}
