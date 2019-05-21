<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusClientIntervention extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('client_intervention', function (Blueprint $table) {
            $table->tinyinteger('status')->after('intervention_type')->default('0')->comment('0-Pending, 1-Completed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('client_intervention', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

}
