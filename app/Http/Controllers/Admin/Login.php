<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class Login
{
    public function __invoke(LoginRequest $request)
    {
        $username = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember = $request->has('remember') ? 1 : 0;

        $request->merge([$username => $request->username]);

        $credentials = $request->only($username, 'password');

        return (Auth::attempt($credentials, $remember))
            ? redirect()->route('dashboard')->with('success', "Welcome!")
            : redirect()->back()->withErrors(['errors' => "There is an issue, please try again"]);
    }
}
