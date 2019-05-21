<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToQuestionSubmitTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('question_submit', function (Blueprint $table) {
            $table->foreign('manage_session_id')->references('id')->on('managesessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('option_id')->references('id')->on('question_option')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('question_submit', function (Blueprint $table) {
            $table->dropForeign(['managesession_id_foreign', 'question_id_foreign', 'option_id_foreign']);
        });
    }

}
