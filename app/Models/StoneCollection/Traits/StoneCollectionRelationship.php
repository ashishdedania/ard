<?php

namespace App\Models\StoneCollection\Traits;
use App\Models\Clientknowledgebase\Clientknowledgebase;
/**
 * Class KnowledgebaseRelationship
 */
trait StoneCollectionRelationship {
	/*
	 * put you model relationships here
	 * Take below example for reference
	 */
	/*
	public function users() {
	//Note that the below will only work if user is represented as user_id in your table
	//otherwise you have to provide the column name as a parameter
	//see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
	$this->belongsTo(User::class);
	}
	 */

	/**
	 *
	 * knowledgeBase Relation with client knowledgebase.
	 */
	/*public function clientStoneCollection() {
		return $this->hasMany(Clientknowledgebase::class , 'knowledge_bases_id');
	}*/
}
