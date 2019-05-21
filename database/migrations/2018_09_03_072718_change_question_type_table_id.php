<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeQuestionTypeTableId extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('question_type', function (Blueprint $table) {
            \DB::statement("ALTER TABLE  `question_type` CHANGE  `id`  `id` TINYINT( 4 ) NOT NULL AUTO_INCREMENT");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('question_type', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `question_type` CHANGE `id` `id` INT(11)");
        });
    }

}
