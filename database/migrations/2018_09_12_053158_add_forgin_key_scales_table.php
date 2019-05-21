<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForginKeyScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('behaviour_scale', function (Blueprint $table) {
            $table->foreign('behaviour_id')->references('id')->on('behaviour')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('behaviour_scale', function (Blueprint $table) {
            $table->dropForeign('behaviour_scale_behaviour_id_foreign');

        });
    }
}
