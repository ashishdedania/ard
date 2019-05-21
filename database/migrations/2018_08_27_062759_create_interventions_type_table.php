<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTypeTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('interventions_type', function (Blueprint $table) {
				$table->increments('id')->comment('Primary key of table');
				$table->string('name', 191)->comment('Name of Interventions');
				$table->tinyInteger('status')->nullable()->comment('1-Active,0-Inactive');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('interventions_type');
	}
}
