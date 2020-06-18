<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallApplication;
use App\Models\{User, Profile, Setting};

class AppInstallController
{
    /**
     * Install the application
     *
     * @param \App\Http\Requests\InstallApplication $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(InstallApplication $request)
    {

    }

    protected function extractUser($request)
    {
        return [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ][$request];
    }
}
