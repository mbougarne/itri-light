<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendReplyMessage extends FormRequest
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
            'subject' => 'required',
            'body' => 'required',
        ];
    }
}
