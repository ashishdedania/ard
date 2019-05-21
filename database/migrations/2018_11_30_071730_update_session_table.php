<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSessionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->tinyInteger('show_tile_card')->default('0')->after('session_visit')->comment('0:Not Show,1:Show Tile Card Client Side');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->dropColumn('show_tile_card');
			});
	}
}
