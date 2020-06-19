<?php

namespace App\Http\Controllers\Admin\Profiles;

use Illuminate\Support\Str;

use App\Http\Requests\UpdateProfile as ProfileRequest;
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

        if($request->hasFile('avatar')) $data['avatar'] = $this->updateAvatar($request);

        $profile->update($data);

        return redirect()->route('users.profile.update')->with('success', 'Profile has updated');
    }

    /**
     * Update user avatar
     *
     * @param \App\Http\Requests\ProfileRequest $request
     * @return string
     */
    protected function updateAvatar($request) : string
    {
        $ext = $request->file('avatar')->extension();
        $avatar = md5(Str::random() . time()) . '.' . $ext;
        $request->file('avatar')->storeAs('avatars', $avatar, 'uploads');
        return $avatar;
    }
}
