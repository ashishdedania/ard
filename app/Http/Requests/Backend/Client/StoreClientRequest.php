<?php

namespace App\Http\Requests\Backend\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return access()->allow('create-client');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'first_name'  => 'required',
			'last_name'   => 'required',
			'email'       => 'required|email|unique:users',
			'client_code' => 'required|unique:clients',
			//'password'          => 'required|min:4',
			'dob'               => 'required',
			'age'               => 'required',
			'intervention_type' => 'required',
		];
	}

	public function messages() {
		return [
			'first_name.required'        => 'The Surname field is required.',
			'last_name.required'         => 'The Forename name field is required.',
			'email.required'             => 'The Email field is required.',
			'email.email'                => 'The Email is invalid.',
			'email.unique'               => 'This Email is already registered.',
			'client_code.required'       => 'The Client id field is required',
			'client_code.unique'         => 'This Client id is already assigned.',
			'password.required'          => 'The Password field is required.',
			'password.min'               => 'The Password field is minimum 4 characters required.',
			'dob.required'               => 'The Date of birth field is required.',
			'age.required'               => 'The Age field is required.',
			'intervention_type.required' => 'The Clinic Service field is required.'
		];
	}

}
