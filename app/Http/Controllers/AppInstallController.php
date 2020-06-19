<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\{User, Profile, Setting};
use App\Http\Requests\InstallApplication;

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
        $this->createUser($request->validated());
        $this->saveSettings($request);
        return redirect()->route('dashboard')->with('success', "App has installed");
    }

    /**
     * Create user and its profile
     *
     * @param array $userData
     * @return void
     */
    protected function createUser(array $userData)
    {
        $user = User::create($this->extractUser($userData));
        $profile = array_merge($this->extractProfile($userData), ['user_id' => $user->id]);
        Profile::create($profile);
    }

    /**
     * Save settings
     *
     * @param \App\Http\Requests\InstallApplication $request
     * @return void
     */
    protected function saveSettings(InstallApplication $request)
    {
        $settings = array_merge($this->extractSettings($request->validated()), ['logo' => $this->storeLogo($request)]);
        Setting::create($settings);
    }

    /**
     * Extract user credemtials from the request
     *
     * @param array $request
     * @return array
     */
    protected function extractUser(array $request) : array
    {
        return [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
        ];
    }

    /**
     * Extract profile details from the request
     *
     * @param array $request
     * @return array
     */
    protected function extractProfile(array $request) : array
    {
        return [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
        ];
    }

    /**
     * Extract settings from the request
     *
     * @param array $request
     * @return array
     */
    protected function extractSettings(array $request) : array
    {
        return [
            'title' => $request['title'],
            'description' => $request['description'],
            'admin_email' => $request['admin_email'],
        ];
    }

    /**
     * Store app logo and return generated name
     *
     * @param \App\Http\Requests\InstallApplication $request
     * @return string
     */
    protected function storeLogo(InstallApplication $request) : string
    {
        $ext = $request->file('logo')->extension();
        $logo = md5(Str::random(16) . time()) . '.' . $ext;

        $request->file('logo')->storeAs('logos', $logo, 'uploads');

        return $logo;
    }
}
