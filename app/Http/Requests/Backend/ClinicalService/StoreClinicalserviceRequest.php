<?php

namespace App\Http\Requests\Backend\ClinicalService;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicalserviceRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return access()->allow('create-clinicalservice');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|max:191',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Clinic Service name must required',
            'name.max' => 'Clinic Service may not be greater than 191 characters.',
        ];
    }

}
