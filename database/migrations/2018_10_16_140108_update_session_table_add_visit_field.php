<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSessionTableAddVisitField extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
         Schema::table('managesessions', function (Blueprint $table) {
            $table->tinyInteger('session_visit')->nullable()->after('session_date')->comment('Session visit 1:Yes,0:No');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('managesessions', function (Blueprint $table) {
            $table->dropColumn('session_visit');
        });
    }
}
