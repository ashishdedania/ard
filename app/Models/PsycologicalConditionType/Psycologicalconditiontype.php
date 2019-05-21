<?php

namespace App\Models\PsycologicalConditionType;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\PsycologicalConditionType\Traits\PsycologicalconditiontypeAttribute;
use App\Models\PsycologicalConditionType\Traits\PsycologicalconditiontypeRelationship;

class Psycologicalconditiontype extends Model
{
    use ModelTrait,
        PsycologicalconditiontypeAttribute,
    	PsycologicalconditiontypeRelationship {
            // PsycologicalconditiontypeAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

  protected $table="psycological_types";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['name', 'status', 'created_by', 'updated_by'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.psycologicalconditiontypes.table');
    }

}
