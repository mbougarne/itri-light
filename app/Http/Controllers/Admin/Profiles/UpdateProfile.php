<?php

namespace App\Http\Controllers\Admin\Profiles;

use App\Http\Requests\UpdateProfile as ProfileRequest;
use App\Services\StoreFileService as StoreFile;
use App\Models\Profile;

class UpdateProfile
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('default.dashboard.users.profile.update', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $data = $request->validated();

        if($request->hasFile('avatar')) $data['avatar'] = StoreFile::store($request, 'avatar', 'avatars');

        $profile->update($data);

        return redirect()->back()->with('success', 'Profile has updated');
    }
}
