<?php

namespace App\Http\Requests\Backend\PsycologicalConditionType;

use Illuminate\Foundation\Http\FormRequest;

class StorePsycologicalconditiontypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-psycologicalconditiontype');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'name' => 'required|max:191',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Condition name must required',
            'name.max'      => 'Condition name may not be greater than 191 characters.',


        ];
    }
}
