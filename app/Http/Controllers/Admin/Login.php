<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class Login
{
    /**
     * Get login form
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('default.front.login');
    }

    /**
     * Process login
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\htpp\Response
     */
    public function login(LoginRequest $request)
    {
        $username = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember = $request->has('remember') ? 1 : 0;
        $validated = array_merge($request->all(), [$username => $request->username]);

        $credentials = [
            'username' => $validated[$username],
            'password' => $validated['password']
        ];

        return (Auth::attempt($credentials, $remember))
            ? redirect()->route('dashboard')->with('success', "Welcome!")
            : redirect()->back()->withErrors(['errors' => "There is an issue, please try again"]);
    }
}
