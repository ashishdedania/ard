<?php

namespace App\Models\StoneCollection;

use App\Models\StoneCollection\Traits\StoneCollectionAttribute;
use App\Models\StoneCollection\Traits\StoneCollectionRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoneCollection extends Model {

	use ModelTrait,
    SoftDeletes,
	StoneCollectionAttribute,
	StoneCollectionRelationship {
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
	protected $table = 'stone_collection';

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
        'deleted_at'
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
