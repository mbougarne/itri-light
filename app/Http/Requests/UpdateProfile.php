<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'sometimes|nullable',
            'github' => 'sometimes|nullable',
            'twitter' => 'sometimes|nullable',
            'facebook' => 'sometimes|nullable',
            'avatar' => 'sometimes|nullable|image|max:5000',
            'bio' => 'sometimes|nullable'
        ];
    }
}
