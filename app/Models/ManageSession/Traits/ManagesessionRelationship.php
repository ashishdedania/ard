<?php

namespace App\Models\ManageSession\Traits;
use App\Models\Client\Client;
use App\Models\InterventionType\InterventionType;
use App\Models\QuestionBank\Questionbank;
use App\Models\QuestionSubmit\QuestionSubmit;
use App\Models\QuestionType\QuestionType;
use App\Models\SubjectiveQuestionSave\SubjectiveQuestionSave;

/**
 * Class ManagesessionRelationship
 */
trait ManagesessionRelationship {

	/**
	 * Many-to-Many relations with Role.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public

function questionType() {
		return $this->hasMany(Questionbank::class , 'type_id');
	}

	/**
	 *
	 * submit question for particular session.
	 */
	public function submitquestion() {
		return $this->hasMany(QuestionSubmit::class , 'manage_session_id');
	}

	/**
	 *
	 * Session wise client
	 */
	public function sessionClient() {
		return $this->hasOne(Client::class , 'id', 'client_id');
	}

	/**
	 *
	 * session subkective question option relation.
	 * @return type
	 */
	public function subjectiveOption() {
		return $this->hasMany(SubjectiveQuestionSave::class , 'manage_session_id');
	}
	/**
	 * Session Intervention
	 *
	 */
	public function sessionIntervention() {
		return $this->hasOne(InterventionType::class , 'id', 'intervention_type');
	}

}
