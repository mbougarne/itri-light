<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts,id,' . $this->route('post')->id,
            'description' => 'sometimes|nullable',
            'body' => 'required',
            'thumbnail' => 'sometimes|nullable|image|max:5000',
            'is_published' => 'sometimes',
        ];
    }
}
