<?php

namespace App\Models\SubStoneCollection;

use App\Models\SubStoneCollection\Traits\SubStoneCollectionAttribute;
use App\Models\SubStoneCollection\Traits\SubStoneCollectionRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;


class SubStoneCollection extends Model {

	use ModelTrait,
    SubStoneCollectionAttribute,
	SubStoneCollectionRelationship {
		// StoneCollectionAttribute::getEditButtonAttribute insteadof ModelTrait;
	}

	/**
	 * NOTE : If you want to implement Soft Deletes in this model,
	 * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
	 */

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'sub_stone_collection';

	/**
	 * Mass Assignable fields of model
	 * @var array
	 */
	protected $fillable = [
	];

	/**
	 * Default values for model fields
	 * @var array
	 */
	protected $attributes = [
	];

	/**
	 * Dates
	 * @var array
	 */
	protected $dates = [
		'created_at',
		'updated_at',
    ];

	/**
	 * Guarded fields of model
	 * @var array
	 */
	protected $guarded = [
		'id'
	];

	/**
	 * Constructor of Model
	 * @param array $attributes
	 */
	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
	}

}
