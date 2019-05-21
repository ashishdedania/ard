<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameClinicalservicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::rename('clinicalservices', 'services');
    }

    public function down() {
        Schema::rename('services', 'clinicalservices');
    }

}
