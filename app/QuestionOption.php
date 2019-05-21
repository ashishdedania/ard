<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class QuestionOption extends Model
{
	use SoftDeletes;
	//dd("tedt");
    protected $table = "question_option";
    //dd($table);
    protected $fillable = ['question_id', 'marks', 'option','deleted_at'];

    protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        //$this->table = config('module.question_option.table');
    }
}
