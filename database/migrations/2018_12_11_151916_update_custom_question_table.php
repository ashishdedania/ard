<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCustomQuestionTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('custom_question', function (Blueprint $table) {
                $table->integer('is_submited_by')->after('question_name')->comment('1:Client submit the goals,0:Admin Submit the goals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('custom_question', function (Blueprint $table) {
            $table->dropColumn('is_submited_by');
        });
    }
}
