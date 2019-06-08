<?php

namespace App\Models\IndoorImages\Traits;

use App\Models\OutdoorCollection\OutdoorCollection;

/**
 * Class KnowledgebaseRelationship
 */
trait IndoorImagesRelationship {

	/**
	 *
	 * knowledgeBase Relation with client knowledgebase.
	 */
	public function parent_group() {
		return $this->belongsTo(OutdoorCollection::class , 'collection_id');

	}
	
}
