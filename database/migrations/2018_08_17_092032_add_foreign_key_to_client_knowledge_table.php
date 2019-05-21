<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToClientKnowledgeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('client_knowledge', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('knowledge_bases_id')->references('id')->on('knowledge_bases')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('client_knowledge', function (Blueprint $table) {
            $table->dropForeign('client_knowledge_client_id_foreign');
            $table->dropForeign('client_knowledge_knowledge_bases_id_foreign');
        });
    }

}
