<?php

namespace App\Models\Clientknowledgebase\Traits;

use App\Models\Client\Client;
use App\Models\KnowledgeBase\Knowledgebase;

/**
 * Class KnowledgebaseRelationship
 */
trait ClientknowledgebaseRelationship {

    /**
     *
     * Client knowledgebase Relation
     */
    public function clients() {
        return $this->hasMany(Client::class, 'id');
    }

    /**
     *
     * knowledgeBase Relation with client knowledgebase.
     */
    public function knowledgebase() {
        return $this->hasOne(Knowledgebase::class, 'id', 'knowledge_bases_id');
    }

}
