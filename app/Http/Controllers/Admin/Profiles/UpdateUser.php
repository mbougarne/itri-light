<?php

namespace App\Http\Controllers\Admin\Profiles;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUser as UserRequest;
use App\Models\User;

class UpdateUser
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('default.dashboard.users.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if($request->has('password')) $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->back()->with('success', 'User has updated');
    }
}
