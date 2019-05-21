<?php

namespace App\Models\QuestionType\Traits;
use App\Models\ManageSession\ManageSession;
use App\Models\QuestionBank\Questionbank;
/**
 * Class ManagesessionRelationship
 */
trait QuestionTypeRelationship
{
    
    /**
     * 
     * Manage session belogs to one question type.
     */

    public function maanageSession () {
         return $this->belongsTo(Managesession::class,'id');
    }

   /**
    *
    * Question type belong to question
    */
   public function question() {
    return $this->hasMany(Questionbank::class,'type_id');
   }

}
