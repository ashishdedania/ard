<?php

namespace App\Models\Behaviour;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model {
    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'behaviour_scale';

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
