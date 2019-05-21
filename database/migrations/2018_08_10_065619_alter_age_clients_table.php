<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAgeClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('clients', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `clients` CHANGE `age` `age` TINYINT(127) NULL DEFAULT NULL COMMENT 'client age'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('clients', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `clients` CHANGE `age` `age` INT(11) NULL DEFAULT NULL COMMENT 'client age'");
        });
    }

}
