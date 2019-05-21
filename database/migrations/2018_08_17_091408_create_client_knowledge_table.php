<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientKnowledgeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('client_knowledge', function (Blueprint $table) {
				$table->increments('id')->comment('Primary Key of Table');
				$table->integer('client_id')->unsigned()->index('clients_id_foreign')->comment('Foreign key of Client Table')->comment('Foreign key of Client Table');
				$table->integer('knowledge_bases_id')->unsigned()->index('knowledge_bases_id_foreign')->comment('Foreign key of knowledge Base Table');
				$table->string('ratings', 191)->nullable()->comment('ratings of knowledge');
				$table->tinyInteger('is_send')->comment('1:send,0:not send')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('client_knowledge');
	}

}
