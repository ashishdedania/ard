<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeBasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('knowledge_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('file');
            $table->float('rating');
            $table->float('average_rating');
            $table->boolean('status')->default(0)->comment('knowledge base status for 1:Active,0:Inactive');
            $table->integer('created_by')->unsigned()->index()->comment('Record created by user');
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
        Schema::dropIfExists('knowledge_bases');
    }

}
