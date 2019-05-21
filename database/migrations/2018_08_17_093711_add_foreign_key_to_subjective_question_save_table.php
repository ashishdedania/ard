<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToSubjectiveQuestionSaveTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('subjective_question_save', function (Blueprint $table) {
            $table->foreign('manage_session_id')->references('id')->on('managesessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('question_id')->references('id')->on('custom_question')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('subjective_question_save', function (Blueprint $table) {
            $table->dropForeign(['managesession_id_foreign', 'question_id_foreign']);
        });
    }

}
