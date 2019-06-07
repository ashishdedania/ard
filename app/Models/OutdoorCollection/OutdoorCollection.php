<?php

namespace App\Models\OutdoorCollection;

use App\Models\OutdoorCollection\Traits\OutdoorCollectionAttribute;
use App\Models\OutdoorCollection\Traits\OutdoorCollectionRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutdoorCollection extends Model {

	use ModelTrait,
    OutdoorCollectionAttribute,
	OutdoorCollectionRelationship {
		// OutdoorCollectionAttribute::getEditButtonAttribute insteadof ModelTrait;
	}

	/**
	 * NOTE : If you want to implement Soft Deletes in this model,
	 * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
	 */

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'indoor_outdoor';

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
