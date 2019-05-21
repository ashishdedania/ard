<?php

namespace App\Models\Client\Traits;

/**
 * Class ClientAttribute.
 */
trait ClientAttribute {
	// Make your attributes functions here
	// Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

	/**
	 * Action Button Attribute to show in grid
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-client", "admin.clients.edit").'
                '.$this->addSubjectiveQue("manage-client", "admin.clients.custom.question").'
                '.$this->getDeleteButtonAttribute("delete-client", "admin.clients.destroy").'
                </div>';
	}
	/**
	 *
	 * add subjective question.
	 */
	public function addSubjectiveQue() {
		return '<a class="btn btn-flat btn-default" href="'.route('admin.clients.custom.question', $this).'">
                    <i data-toggle="tooltip" data-placement="top" title="Subjective Questions" class="fa fa-question"></i>
                </a>';
	}
	/**
	 * @return string
	 */
	public function getStatusLabelAttribute() {
		if ($this->isActive()) {
			return "<label class='label label-success'>".'Active'.'</label>';
		}

		return "<label class='label label-danger'>".'Inactive'.'</label>';
	}

	/**
	 * @return bool
	 */
	public function isActive() {
		return $this->status == 1;
	}

}
