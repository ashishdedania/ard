<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldToCustomQuestionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('custom_question', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `managesessions` CHANGE `custom_question_id` `custom_question_id` INT(11) NULL DEFAULT NULL COMMENT '1:Subjective_question,2:No_question,0:Objective_question'");
				\DB::statement("ALTER TABLE `custom_question`  DROP `send_status`");
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('custom_question', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `managesessions` CHANGE `custom_question_id` `custom_question_id` INT(11) NULL DEFAULT NULL COMMENT 'custom_question'");
				\DB::statement("ALTER TABLE `custom_question` ADD `send_status` tinyint(4) NULL AFTER `client_id`");
			});
	}
}
