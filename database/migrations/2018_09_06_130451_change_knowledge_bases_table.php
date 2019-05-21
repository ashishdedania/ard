<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeKnowledgeBasesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('knowledge_bases', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `knowledge_bases` CHANGE `average_rating` `average_rating` DECIMAL(7,2) NOT NULL");
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('knowledge_bases', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `knowledge_bases` CHANGE `average_rating` `average_rating` DOUBLE(8,2) NOT NULL");
			});
	}
}
