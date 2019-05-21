<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSessionTableToManagesessionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `managesessions` ADD `threshold` VARCHAR(191) NOT NULL DEFAULT '0' COMMENT 'Session Threshold value' AFTER `description`");
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function (Blueprint $table) {
				if (Schema::hasColumn('managesessions', 'threshold')) {
					\DB::statement("ALTER TABLE `managesessions` DROP `threshold`");
				}
			});
	}
}
