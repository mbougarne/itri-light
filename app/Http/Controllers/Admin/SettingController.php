<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateAppSettings;
use App\Models\Setting;
use App\Services\StoreFileService as StoreFile;

class SettingController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('default.dashboard.settings.update', [
                'title' => 'Update Settings',
                'setting' => Setting::first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppSettings  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSettings $request)
    {
        $data = $request->validated();

        if($request->hasFile('logo')) $data['logo'] = StoreFile::store($request, 'logo', 'logos');
        if($request->hasFile('favicon')) $data['favicon'] = StoreFile::store($request, 'favicon', 'logos');

        Setting::first()->update($data);

        return redirect()->route('settings.update')->with('success', 'Setting has updated');
    }
}
