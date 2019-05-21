<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $table = "question_type";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
