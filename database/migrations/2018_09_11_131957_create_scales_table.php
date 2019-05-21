<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behaviour_scale', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scale');
            $table->integer('behaviour_id')->unsigned()->index('behaviour_id_foreing')->comment('Foreign Key of Behaviour table');
            $table->tinyInteger('scale_from');
            $table->tinyInteger('scale_to');
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('behaviour_scale');
    }
}
