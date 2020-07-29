<?php

namespace App\Http\Controllers\Admin\Profiles;

use App\Http\Requests\UpdateProfile as ProfileRequest;
use App\Services\StoreFileService as StoreFile;

class UpdateProfile
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('default.dashboard.users.profile.update', [
                    'title' => 'Update Your Profile',
                    'profile' => auth()->user()->profile
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('avatar')) $data['avatar'] = StoreFile::store($request, 'avatar', 'avatars');

        auth()->user()->profile->update($data);

        return redirect()->back()->with('success', 'Profile has updated');
    }
}
