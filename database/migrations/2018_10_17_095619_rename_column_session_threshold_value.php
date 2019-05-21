<?php

use Illuminate\Database\Migrations\Migration;

class RenameColumnSessionThresholdValue extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function ($table) {
				$table->renameColumn('threshold', 'threshold_start');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function ($table) {
				$table->renameColumn('threshold_start', 'threshold');
			});
	}
}
