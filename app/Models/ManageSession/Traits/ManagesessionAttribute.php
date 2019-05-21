<?php

namespace App\Models\ManageSession\Traits;

/**
 * Class ManagesessionAttribute.
 */
trait ManagesessionAttribute {
	// Make your attributes functions here
	// Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

	/**
	 * Action Button Attribute to show in grid
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		$sessionType = trans('strings.backend.session_type');
		$type        = array_search($this->custom_question_id, $sessionType);
		$actionBtn   = '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-managesession", "admin.managesessions.edit").'
                '.$this->viewQuestion("edit-managesession", "admin.managesessions.views.details").'
                '.$this->getDeleteButtonAttribute("delete-managesession", "admin.managesessions.destroy").'
                </div>';

		return $actionBtn;
	}
	/**
	 * @return string
	 */
	public function getStatusLabelAttribute() {
		if ($this->custom_question_id == 2 && $this->status == 2) {
			return "<label class='label label-warning'>".'No Questions'.'</label>';
		}
		if ($this->isActive()) {
			return "<label class='label label-success'>".'Submited'.'</label>';
		} else {
			return "<label class='label label-danger'>".'Pending'.'</label>';
		}

	}

	/**
	 * @return bool
	 */
	public function isActive() {
		return $this->status == 1;
	}

	/**
	 *
	 * view question for submited session.
	 */
	public function viewQuestion($permission, $route) {
		if (access()->allow($permission)) {
			return '<a href="'.route($route, [$this->id]).'" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="View Questions" class="fa fa-eye"></i>
                </a>';
		}
	}
}
