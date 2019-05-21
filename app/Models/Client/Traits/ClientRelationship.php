<?php

namespace App\Models\Client\Traits;

use App\Models\ManageSession\Managesession;
use App\Models\Access\User\User;
use App\Models\Clientknowledgebase\Clientknowledgebase;
use App\Models\SubjectiveQuestion\SubjectiveQuestion;

/**
 * Class ClientRelationship
 */
trait ClientRelationship {
    /*
     * put you model relationships here
     * Take below example for reference
     */

    public function users() {
        // Note that the below will only work if user is represented as user_id in your table
        //otherwise you have to provide the column name as a parameter
        //see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     *
     * Client has many sessions.
     */
    public function getSession() {
        return $this->hasMany(Managesession::class, 'client_id');
    }

    /**
     *
     * knowledgeBase relationship.
     */
    public function getknowledgeBase() {
        return $this->hasMany(Clientknowledgebase::class, 'client_id');
    }

    /**
     *
     * Subjective Question for Client
     */
    public function subjectiveQuestion() {
        return $this->hasMany(SubjectiveQuestion::class, 'client_id');
    }

    public function getFeedbacks() {
        return $this->hasMany(Feedback::class, 'client_id');
    }

}
