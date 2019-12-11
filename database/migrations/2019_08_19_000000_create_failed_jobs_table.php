<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateFailedJobsTable
 */
class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'failed_jobs',
            static function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->text('connection')->nullable();
                $table->text('queue')->nullable();
                $table->longText('payload')->nullable();
                $table->longText('exception')->nullable();
                $table->timestamp('failed_at')->useCurrent();
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
        Schema::dropIfExists('failed_jobs');
    }
}
