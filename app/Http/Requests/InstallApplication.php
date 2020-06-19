<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class InstallApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Schema::hasTable('users')) && User::count() !== 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'admin_email' => 'required|email',
            'logo' => 'required|image|max:5000',
        ];
    }
}
