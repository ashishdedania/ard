<?php

namespace App\Models\Report\Traits;

/**
 * Class ReportAttribute.
 */
trait ReportAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-report", "admin.reports.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-report", "admin.reports.destroy") . '
                </div>';
    }

}
