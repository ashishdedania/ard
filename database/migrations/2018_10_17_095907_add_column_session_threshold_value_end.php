<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnSessionThresholdValueEnd extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function ($table) {
				$table->string('threshold_end', 191)->default(0)->after('threshold_start')->comment('threshold_end');
				$table->string('insert_note', 191)->default(0)->after('threshold_end')->comment('insert_note');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function ($table) {
				$table->dropColumn('threshold_end');
				$table->dropColumn('insert_note');
			});
	}
}
