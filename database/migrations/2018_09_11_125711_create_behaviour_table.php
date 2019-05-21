<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBehaviourTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('behaviour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('behaviour');
            $table->tinyInteger('question_type_id')->length(4)->index('question_type_id_foreing')->comment('Foreign Key of Question type table');
            $table->boolean('is_behaviour')->default(1)->comment('1-behaviour, 0-total, 2-total(-)risk');
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('behaviour');
    }

}
