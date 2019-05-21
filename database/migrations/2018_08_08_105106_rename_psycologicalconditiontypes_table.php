<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePsycologicalconditiontypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::rename('psycologicalconditiontypes', 'psycological_types');
    }

    public function down() {
        Schema::rename('psycological_types', 'psycologicalconditiontypes');
    }

}
