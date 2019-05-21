<?php

namespace App\Http\Requests\Backend\KnowledgeBase;

use Illuminate\Foundation\Http\FormRequest;

class SendKnowledgebaseRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return access()->allow('manage-knowledgebase');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'client' => 'required',
		];
	}

	public function messages() {
		return [
			'client.required' => 'The Client field is required.',
		];
	}

}
