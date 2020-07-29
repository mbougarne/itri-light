<?php

namespace App\Http\Controllers\Admin\Profiles;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUser as UserRequest;

class UpdateUser
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('default.dashboard.users.update', [
                    'title' => 'Update Your Account',
                    'user' => auth()->user()
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $data = $request->validated();

        if($request->has('password')) $data['password'] = Hash::make($data['password']);

        auth()->user()->update($data);

        return redirect()->back()->with('success', 'User has updated');
    }
}
