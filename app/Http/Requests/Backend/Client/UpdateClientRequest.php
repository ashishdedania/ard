<?php

namespace App\Http\Requests\Backend\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest {

    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return access()->allow('edit-client');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $client_id = $this->client_id;
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'age' => 'required',
            'client_code' => 'required|unique:clients,client_code,'.$client_id,
                //'intervention_type' => 'required',
        ];
    }

    public function messages() {
        return [
            'first_name.required' => 'The Surname field is required.',
            'last_name.required' => 'The Forename name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email is invalid.',
            'dob.required' => 'The Date of birth field is required.',
            'age.required' => 'The Age  field is required.',
            'client_code.required'       => 'The Client id field is required',
            'client_code.unique'         => 'This Client id is already assigned.',
                //'intervention_type.required' => 'The Interventions Type field is required.'
        ];
    }

}
