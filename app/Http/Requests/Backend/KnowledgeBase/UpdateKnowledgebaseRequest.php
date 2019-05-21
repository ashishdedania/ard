<?php

namespace App\Http\Requests\Backend\KnowledgeBase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKnowledgebaseRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return access()->allow('edit-knowledgebase');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
                // 'title'       => 'required',
                // 'description' => 'required',
                // 'file.0'      => 'required',
        ];
    }

    public function messages() {
        return [
                // 'title.required'       => 'The Title filed is required.',
                // 'description.required' => 'The Description field is required.',
                // 'file.0.required'      => 'The Upload field is required.',
        ];
    }

}
