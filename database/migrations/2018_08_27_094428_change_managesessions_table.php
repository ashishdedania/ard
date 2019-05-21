<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeManagesessionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->integer('intervention_type')->after('custom_question_id')->index('intervention_type_id_foreing')->comment('Foreign Key of Intervention Type table');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('managesessions', function (Blueprint $table) {
				$table->dropColumn('intervention_type');
			});
	}
}
