<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagesessionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('managesessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index('clients_id_foreign')->comment('Foreign key of Client Table');
            $table->integer('question_type_id')->nullable()->unsigned()->index('question_type_id_foreign')->comment('Foreign key of Question Type Table');
            $table->integer('custom_question_id')->nullable()->comment('custom question id');
            $table->string('title')->nullable()->comment('Session Title');
            $table->text('description')->nullable()->comment('description of session');
            $table->boolean('status')->default(0)->comment('Session status for 1:Active,0:Inactive');
            $table->integer('created_by')->unsigned()->index('users_id_foreign')->comment('Record created by user');
            $table->integer('updated_by')->unsigned()->index('update_users_id_foreign')->nullable()->comment('Record updated by user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('managesessions');
    }

}
