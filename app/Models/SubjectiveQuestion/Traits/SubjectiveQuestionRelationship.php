<?php

namespace App\Models\SubjectiveQuestion\Traits;

use App\Models\SubjectiveQuestionSave\SubjectiveQuestionSave;

/**
 * Class QuestionbankRelationship
 */
trait SubjectiveQuestionRelationship {

	/**
	 *
	 * question option relation.
	 * @return type
	 */
	public function subjectiveOption() {
		return $this->hasMany(SubjectiveQuestionSave::class,'question_id');
	}

}
