<?php

namespace App\Models\SubjectiveQuestion\Traits;

/**
 * Class QuestionbankAttribute.
 */
trait SubjectiveQuestionAttribute {
	// Make your attributes functions here
	// Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

	/**
	 * Action Button Attribute to show in grid
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-questionbank", "admin.questionbanks.edit").'
                '.$this->getDeleteButtonAttribute("delete-questionbank", "admin.questionbanks.destroy").'
                </div>';
	}

	public function getStatusLabelAttribute() {
		if ($this->isActive()) {
			return "<label class='label label-success'>".trans('labels.general.active').'</label>';
		}

		return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
	}

	/**
	 * @return bool
	 */
	public function isActive() {
		return $this->status == 1;
	}
}
