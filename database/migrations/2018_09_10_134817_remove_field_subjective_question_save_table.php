<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldSubjectiveQuestionSaveTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('subjective_question_save', function (Blueprint $table) {
				if (Schema::hasColumn('subjective_question_save', 'is_send')) {
					\DB::statement("ALTER TABLE `subjective_question_save` DROP `is_send`");
				}
				if (Schema::hasColumn('question_submit', 'is_send')) {
					\DB::statement("ALTER TABLE `question_submit` DROP `is_send`");
				}

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('subjective_question_save', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `subjective_question_save` ADD `is_send`");
				\DB::statement("ALTER TABLE `question_submit` ADD `is_send`");
			});
	}
}
