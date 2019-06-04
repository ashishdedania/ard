<?php

namespace App\Models\StoneCollection\Traits;
use App\Models\Clientknowledgebase\Clientknowledgebase;
use App\Models\StoneProduct\StoneProduct;
use App\Models\SubStoneCollection\SubStoneCollection;


/**
 * Class KnowledgebaseRelationship
 */
trait StoneCollectionRelationship {
	/*
	 * put you model relationships here
	 * Take below example for reference
	 */
	
	

	/**
	 *
	 * knowledgeBase Relation with client knowledgebase.
	 */
	public function product() {
		return $this->hasMany(StoneProduct::class , 'collection_id');
	}


	/**
	 *
	 * knowledgeBase Relation with client knowledgebase.
	 */
	public function subcollection() {
		return $this->hasMany(SubStoneCollection::class , 'collection_id');
	}
}
