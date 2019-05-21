<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIsSendFiledClientKnowledgeBase extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('client_knowledge', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `client_knowledge` DROP `is_send`;");
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('client_knowledge', function (Blueprint $table) {
				\DB::statement("ALTER TABLE `client_knowledge` ADD `is_send`");
			});
	}
}
