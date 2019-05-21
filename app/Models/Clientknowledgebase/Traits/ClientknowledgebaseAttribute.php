<?php

namespace App\Models\Clientknowledgebase\Traits;

/**
 * Class KnowledgebaseAttribute.
 */
trait ClientknowledgebaseAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-knowledgebase", "admin.knowledgebases.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-knowledgebase", "admin.knowledgebases.destroy") . '
                ' . $this->sendButton("manage-knowledgebase", "admin.knowledgebases.Send") . '
                </div>';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute() {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . 'Activate' . '</label>';
        }

        return "<label class='label label-danger'>" . 'Deactivate' . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->status == 1;
    }

}
