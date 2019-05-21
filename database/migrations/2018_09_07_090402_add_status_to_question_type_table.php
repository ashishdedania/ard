<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToQuestionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_type', function (Blueprint $table) {
            $table->tinyinteger('status')->after('question_type')->default('1')->comment('0-Inactive, 1-Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_type', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
