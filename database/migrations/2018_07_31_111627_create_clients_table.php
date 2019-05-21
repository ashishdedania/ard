<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index('clients_user_id_foreign');
            $table->date('dob')->nullable()->comment('client date of birth');
            $table->integer('age')->nullable()->comment('client age');
            $table->string('parent')->nullable()->comment('client name of parent or guardian');
            $table->text('contact_address')->nullable()->comment('client contact address');
            $table->string('telephone')->nullable()->comment('client telephone number');
            $table->tinyInteger('ok_to_contact')->nullable()->comment('client ok to contact');
            $table->tinyInteger('ok_to_write')->nullable()->comment('client write to');
            $table->string('about_actualise', 199)->nullable()->comment('about about actualise');
            $table->string('referred_by', 199)->nullable()->comment('referred by of client');
            $table->string('contact_tel_no')->nullable()->comment('client contact tel no');
            $table->string('gp')->nullable()->comment('name and address of emergency contact pearson');
            $table->string('medication_choise', 199)->nullable()->comment('medication of client');
            $table->boolean('status')->default(0)->comment('client status for 1:Active,0:Inactive');
            $table->softDeletes();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable()->comment('Record created by user');
            $table->integer('updated_by')->unsigned()->nullable()->comment('Record updated by user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clients');
    }

}
