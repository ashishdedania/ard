<?php

namespace App\Models\Feedback\Traits;

/**
 * Class FeedbackAttribute.
 */
trait FeedbackAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-feedback", "admin.feedback.edit").'
                '.$this->getDeleteButtonAttribute("delete-feedback", "admin.feedback.destroy").'
                </div>';
    }
}
