<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectiveQuestionSaveTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('subjective_question_save', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manage_session_id')->unsigned()->index('manage_session_id_foreign')->comment('Foreign Key of Manage Session Table');
            $table->integer('question_id')->unsigned()->index('question_id_foreing')->comment('Foreign Key of Custom Question table');
            $table->tinyInteger('options')->comment('Option of Subjective Questions');
            $table->integer('is_send')->nullable()->comment('1:Submited,0:Pending,2:Draft');
            $table->integer('created_by')->unsigned()->index()->comment('Record created by user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('subjective_question_save');
    }

}
