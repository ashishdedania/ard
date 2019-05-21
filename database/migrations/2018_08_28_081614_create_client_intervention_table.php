<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInterventionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('client_intervention', function (Blueprint $table) {
				$table->increments('id')->comment('Primary key of table');
				$table->integer('client_id')->unsigned()->index('client_id_foreing')->comment('Foreign Key of Client table');
				$table->integer('intervention_type')->unsigned()->index('intervention_type_foreing')->comment('Foreign Key of Intervention table');
				$table->foreign('client_id')->references('id')->on('clients');
				$table->foreign('intervention_type')->references('id')->on('interventions_type');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('client_intervention');
	}
}
