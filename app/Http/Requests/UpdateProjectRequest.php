<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Helpers
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=> [
                'required',
                'max:255',
                Rule::unique('projects')->ignore($this->project)
            ],
            'description'=> 'required|max:3000',
            'link'=> [
                'required',
                'max:255',
                'url',
                Rule::unique('projects')->ignore($this->project)
            ],
            'img'=> 'max:2048|image',
            'type_id'=> 'nullable|exists:types,id',
            'technologies'=> 'nullable|array|exists:technologies,id'
        ];
    }
}
