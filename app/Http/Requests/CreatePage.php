<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePage extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:pages',
            'title' => 'sometimes|nullable',
            'description' => 'sometimes|nullable',
            'body' => 'required',
            'thumbnail' => 'sometimes|nullable|image|max:5000',
            'is_published' => 'sometimes',
            'template' => 'sometimes'
        ];
    }
}
