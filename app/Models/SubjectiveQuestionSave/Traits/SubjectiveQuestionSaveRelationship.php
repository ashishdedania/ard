<?php

namespace App\Models\SubjectiveQuestionSave\Traits;

use App\Models\SubjectiveQuestion\SubjectiveQuestion;

/**
 * Class QuestionbankRelationship
 */
trait SubjectiveQuestionSaveRelationship {

	/**
	 *
	 * question option relation.
	 * @return type
	 */
	public function subjectiveQuestion() {
		// return $this->belongsTo(SubjectiveQuestion::class);
	}

}
