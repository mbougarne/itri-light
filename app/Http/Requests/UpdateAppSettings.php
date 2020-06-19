<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppSettings extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|nullable|image|max:5000',
            'favicon' => 'sometimes|nullable|image|max:2000',
            'header_scripts' => 'sometimes|nullable',
            'footer_scripts' => 'sometimes|nullable',
            'language' => 'sometimes|nullable',
            'admin_email' => 'sometimes|nullable|email',
        ];
    }
}
