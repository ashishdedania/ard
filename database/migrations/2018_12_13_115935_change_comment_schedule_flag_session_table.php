<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCommentScheduleFlagSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('managesessions', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `managesessions` CHANGE `schedule_flag` `schedule_flag` TINYINT(4) NULL DEFAULT NULL COMMENT '1:For Shedule Assessment today,NULL:Shedule for other day'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('managesessions', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `managesessions` CHANGE `schedule_flag` `schedule_flag` TINYINT(4) NULL DEFAULT NULL COMMENT 'Schedule Flag for visible on assessment on that date'");
        });
    }
}
