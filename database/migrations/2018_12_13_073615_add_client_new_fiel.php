<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientNewFiel extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('medication_description',191)->after('medication_choise')->comment('Medication YES the description')->nullable();
             $table->string('referred_by_description',191)->after('referred_by')->comment('Refered_by_other_descripion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('medication_description');
            $table->dropColumn('referred_by_description');
        });
    }
}
