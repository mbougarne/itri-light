<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Http\Requests\UpdateAppSettings;
use App\Models\Setting;

class SettingController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('default.dashboard.settings.update', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppSettings  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSettings $request, Setting $setting)
    {
        $data = $request->validated();

        if($request->hasFile('logo')) $data['logo'] = $this->storeLogo($request);
        if($request->hasFile('favicon')) $data['favicon'] = $this->storeFavicon($request);

        $setting->update($data);

        return redirect()->route('settings')->with('success', 'Setting has updated');
    }

    /**
     * Store logo
     *
     * @param \App\Http\Requests\UpdateAppSettings $request
     * @return string
     */
    protected function storeLogo($request) : string
    {
        $ext = $request->file('logo')->extension();
        $logo = md5(Str::random() . time()) . '.' . $ext;

        $request->file('logo')->storeAs('logos', $logo, 'uploads');

        return $logo;
    }

    /**
     * Store favicon
     *
     * @param \App\Http\Requests\UpdateAppSettings $request
     * @return string
     */
    protected function storeFavicon($request) : string
    {
        $ext = $request->file('favicon')->extension();
        $favicon = md5(Str::random() . time()) . '.' . $ext;

        $request->file('favicon')->storeAs('logos', $favicon, 'uploads');

        return $favicon;
    }
}
