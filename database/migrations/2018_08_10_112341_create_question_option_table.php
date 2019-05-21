<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOptionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('question_option', function (Blueprint $table) {
            $table->increments('id')->comment('Primary key of table');
            $table->integer('question_id')->unsigned()->index('question_id_foreign')->comment('Foreign key of Question Table');
            $table->string('option', 191)->nullable()->comment('Question Option');
            $table->tinyInteger('marks')->nullable()->comment('Question Marks');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('question_option');
    }

}
