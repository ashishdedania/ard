<?php

namespace App\Models\IndoorImages\Traits;

/**
 * Class KnowledgebaseAttribute.
 */
trait IndoorImagesAttribute {
	// Make your attributes functions here
	// Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

	/**
	 * Action Button Attribute to show in grid
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-stonecollection", "admin.indoorimages.edit").'
                '.$this->getDeleteButtonAttribute("delete-stonecollection", "admin.indoorimages.destroy").'
                </div>';
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
