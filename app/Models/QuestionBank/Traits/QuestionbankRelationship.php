<?php

namespace App\Models\QuestionBank\Traits;

use App\Models\QuestionOption\QuestionOption;

/**
 * Class QuestionbankRelationship
 */
trait QuestionbankRelationship {

    /**
     *
     * question option relation.
     * @return type
     */
    public function questionOption() {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

}
