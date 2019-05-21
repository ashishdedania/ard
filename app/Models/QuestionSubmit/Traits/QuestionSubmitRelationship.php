<?php

namespace App\Models\QuestionSubmit\Traits;

use App\Models\ManageSession\Managesession;
/**
 * Class QuestionbankRelationship
 */
trait QuestionSubmitRelationship {

	 /**
     *
     * question submit relation.
     * @return type
     */
    public function QuestionSubmit() {
        return $this->belongsToMany(Managesession::class, 'id');
    }
}
