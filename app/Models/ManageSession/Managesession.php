<?php

namespace App\Models\ManageSession;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManageSession\Traits\ManagesessionAttribute;
use App\Models\ManageSession\Traits\ManagesessionRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Managesession extends Model
{
    use ModelTrait,
        SoftDeletes,
        ManagesessionAttribute,
    	ManagesessionRelationship {
            // ManagesessionAttribute::questionType insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'managesessions';

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
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
   
}
