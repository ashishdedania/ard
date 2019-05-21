<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateManagesessionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('managesessions', function (Blueprint $table) {
            $table->date('session_date')->after('description')->nullable()->comment('Session Date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('managesessions', function (Blueprint $table) {
            $table->dropColumn('session_date');
        });
    }

}
