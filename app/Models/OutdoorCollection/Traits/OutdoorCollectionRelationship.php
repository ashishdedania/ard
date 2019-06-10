<?php

namespace App\Models\OutdoorCollection\Traits;

use App\Models\IndoorImages\IndoorImages;


/**
 * Class KnowledgebaseRelationship
 */
trait OutdoorCollectionRelationship {
	/*
	 * put you model relationships here
	 * Take below example for reference
	 */
	
	/**
	 *
	 * knowledgeBase Relation with client knowledgebase.
	 */
	public function items() {
		return $this->hasMany(IndoorImages::class , 'collection_id')->orderBy('sr_no');
	}

	
}
