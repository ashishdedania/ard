<?php

namespace App\Http\Requests\Backend\ManageSession;

use Illuminate\Foundation\Http\FormRequest;

class StoreManagesessionRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return access()->allow('create-managesession');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		if ($this->request->has('question_type_id')) {
			return [
				'client_id'        => 'required|not_in:0',
				'title'            => 'required',
				'question_type_id' => 'required|not_in:0',
				'session_date'     => 'required',
			];
		} else {
			return [
				'client_id'    => 'required|not_in:0',
				'title'        => 'required',
				'session_date' => 'required',
			];
		}

	}

	public function messages() {
		return [
			'client_id.not_in'        => 'The Clients field is required .',
			'question_type_id.not_in' => 'The Question field is required.',
			'title.required'          => 'The Title field is required.',
			'session_date.required'   => 'The Assessment Date field is required.',
		];
	}

}
