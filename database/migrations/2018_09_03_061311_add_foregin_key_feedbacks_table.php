<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginKeyFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('intervention_type')->references('id')->on('interventions_type')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign('feedbacks_client_id_foreign');
            $table->dropForeign('feedbacks_intervention_type_foreign');

        });
    }
}
