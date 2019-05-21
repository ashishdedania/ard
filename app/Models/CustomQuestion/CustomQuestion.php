<?php

namespace App\Models\CustomQuestion;
use Illuminate\Database\Eloquent\Model;

class CustomQuestion extends Model {

	/**
	 * Constructor of Model
	 * @param array $attributes
	 */
	protected $table;
	protected $fillable = ['id'];
	public function __construct() {
		$this->table = config('module.custom_question.table');
	}
}
