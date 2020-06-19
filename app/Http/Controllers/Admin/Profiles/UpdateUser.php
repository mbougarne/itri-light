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

        if($request->has('password')) $data['password'] = $this->changePassword($data['password']);

        $user->update($data);

        return redirect()->route('users.update')->with('success', 'User has updated');
    }

    /**
     * Update Password
     *
     * @param string $password
     * @return string
     */
    protected function changePassword(string $password) : string
    {
        return Hash::make($password);
    }
}
