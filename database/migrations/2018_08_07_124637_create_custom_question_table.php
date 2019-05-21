<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomQuestionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('custom_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index('clients_id_foreign')->comment('Foreign key of Client Table');
            $table->tinyInteger('send_status')->nullable()->comment('0:Pending,1:Draft,2:Send');
            $table->string('question_name')->nullable()->comment('Question Name');
            $table->integer('created_by')->unsigned()->index('users_id_foreign')->comment('Record created by user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('custom_question');
    }

}
