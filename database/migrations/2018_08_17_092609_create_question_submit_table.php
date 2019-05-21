<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSubmitTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('question_submit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manage_session_id')->unsigned()->index('manage_session_id_foreign')->comment('Foreign Key of Manage Session Table');
            $table->integer('question_id')->unsigned()->index('question_id_foreing')->comment('Foreign Key of Question table');
            $table->integer('option_id')->unsigned()->index('option_id_foreign')->comment('Foreign Key of Option Table');
            $table->tinyInteger('is_send')->comment('1:Submited,0:Pending,2:Draft')->nullable();
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
        Schema::dropIfExists('question_submit');
    }

}
