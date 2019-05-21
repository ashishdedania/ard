<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFiledClientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('clients', function (Blueprint $table) {
				$table->tinyInteger('termes_condition')->default('0')->after('medication_choise')->comment('Terms and Condition');
				$table->tinyInteger('disclaimer')->default('0')->after('termes_condition')->comment('Disclaimer');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('clients', function (Blueprint $table) {
				$table->dropColumn('termes_condition');
				$table->dropColumn('disclaimer');
			});
	}
}
