<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('profile.index', ['user' => $user, 'profile' => $user->profile]);
    }
    public function update(Request $request, User $user)
    {
        $profile = $user->profile;
        $data = $request->all();
        if ($request->hasfile('picture')) {
            $image = $request->picture->store('images/profiles', 'public');
            if ($profile->picture != null) {

                Storage::disk('public')->delete($profile->picture);
            }
            $data['picture'] = $image;
        };
        session()->flash('success', 'User profile updated successfully');
        $profile->update($data);
        $user->update($data);
        if ($user->role == 'Admin') {
            return redirect(route('dashboard'));
        } else {

            return redirect(route('home'));
        }
    }

    public function make_admin(User $user)
    {
        $user->role = 'Admin';
        $user->save();
        session()->flash('success', 'this user become an Admin');
        return redirect(route('users.index'));
    }
    public function make_writer(User $user)
    {
        $user->role = 'Writer';
        $user->save();
        session()->flash('success', 'this user become a writer');
        return redirect(route('users.index'));
    }
}
