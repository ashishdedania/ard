<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index('clients_id_foreign')->comment('Foreign key of Client Table')->comment('Foreign key of Client Table');
            $table->text("comment");
            $table->string('ratings', 191)->nullable()->comment('ratings of feedbacks');
            $table->integer('intervention_type')->unsigned()->index('intervention_type_id_foreing')->comment('Foreign key of Intervention Type Table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
