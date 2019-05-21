<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForginKeyBehaviourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('behaviour', function (Blueprint $table) {
            $table->foreign('question_type_id')->references('id')->on('question_type')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('behaviour', function (Blueprint $table) {
            $table->dropForeign('behaviour_question_type_id_foreign');
        });
    }
}
