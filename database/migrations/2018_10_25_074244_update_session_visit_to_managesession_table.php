<?php

 use Illuminate\Support\Facades\Schema;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Database\Migrations\Migration;

 class UpdateSessionVisitToManagesessionTable extends Migration {

     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up() {
         Schema::table('managesessions', function (Blueprint $table) {
             \DB::statement("UPDATE managesessions  SET
                                session_visit = IFNULL(session_visit, 0);
                            ");
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down() {
         Schema::table('managesessions', function (Blueprint $table) {
             
         });
     }

 }
 