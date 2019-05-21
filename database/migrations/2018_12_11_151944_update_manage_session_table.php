<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateManageSessionTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('managesessions', function (Blueprint $table) {
             $table->date('schedule_date')->after('session_visit')->comment('Schedule Date of Assessment')->nullable();
             $table->tinyInteger('schedule_flag')->after('schedule_date')->comment('Schedule Flag for visible on assessment on that date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('managesessions', function (Blueprint $table) {
                $table->dropColumn('schedule_date');
                $table->dropColumn('schedule_flag');
        });
    }
}
