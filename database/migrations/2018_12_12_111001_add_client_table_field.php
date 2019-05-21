<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientTableField extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('clients', function (Blueprint $table) {
				$table->tinyInteger('information')->after('disclaimer')->comment('Schedule Date of Assessment')->nullable();
				$table->tinyInteger('gdpr')->after('information')->comment('Schedule Date of Assessment')->nullable();
				$table->tinyInteger('research')->after('gdpr')->comment('Schedule Date of Assessment')->nullable();
				$table->tinyInteger('consent_data_collection')->after('research')->comment('Schedule Date of Assessment')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('clients', function (Blueprint $table) {
				$table->dropColumn('information');
				$table->dropColumn('gdpr');
				$table->dropColumn('research');
				$table->dropColumn('consent_data_collection');
			});
	}
}
