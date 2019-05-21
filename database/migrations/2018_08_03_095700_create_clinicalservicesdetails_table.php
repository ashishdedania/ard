<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalservicesdetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clinicalservices_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index('clients_id_foreign');
            $table->smallInteger('clinical_service_id')->unsigned()->index('clinical_service_id_foreign');
            $table->integer('created_by')->unsigned()->nullable()->comment('Record created by user');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('clinical_service_id')->references('id')->on('clinicalservices')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clinicalservices_details');
    }

}
