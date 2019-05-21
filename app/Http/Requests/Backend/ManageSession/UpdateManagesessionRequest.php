<?php

namespace App\Http\Requests\Backend\ManageSession;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagesessionRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return access()->allow('edit-managesession');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		if ($this->request->has('question_type_id')) {
			return [
				'title'            => 'required',
				'session_date'     => 'required',
				'question_type_id' => 'required|not_in:0',
			];
		} else {
			return [
				'title'        => 'required',
				'session_date' => 'required',
			];
		}
		return [
			'title'        => 'required',
			'session_date' => 'required',
		];
	}

	public function messages() {
		return [
			'question_type_id.not_in' => 'The Question field is required.',
			'title.required'          => 'The title field is required.',
			'session_date.required'   => 'The Assessment Date field is required.',
		];
	}

}
