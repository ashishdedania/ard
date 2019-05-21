<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyQuestionOptionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('question_option', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('question_option', function (Blueprint $table) {
            $table->dropForeign(['question_id_foreign']);
        });
    }

}
