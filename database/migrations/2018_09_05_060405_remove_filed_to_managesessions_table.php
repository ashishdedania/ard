<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFiledToManagesessionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function (Blueprint $table) {
				\DB::statement(" ALTER TABLE `managesessions` CHANGE `status` `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Session status for 1:Submited,0:Pending'");
				\DB::statement("ALTER TABLE `managesessions`  DROP `is_subjective_send`,  DROP `is_objective_send`");

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `managesessions` ADD `is_subjective_send` VARCHAR(191) NOT NULL AFTER `status`");
				\DB::statement("ALTER TABLE `managesessions` ADD `is_objective_send` VARCHAR(191) NOT NULL AFTER `is_subjective_send`");
			});
	}
}
