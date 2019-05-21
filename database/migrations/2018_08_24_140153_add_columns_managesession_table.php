<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsManagesessionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->string('is_subjective_send', 191)->after('status')->default(0)->comment('1:Send,0:Not Send');
				$table->string('is_objective_send', 191)->after('is_subjective_send')->default(0)->comment('1:Send,0:Not Send');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->dropColumn(['is_subjective_send', 'is_objective_send']);
			});
	}
}
