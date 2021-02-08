<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Validation\Rule;

class ProfilesController extends Controller
{

    public function index()
    {
        return 'All users...';
    }

    public function show(User $user)
    {
        return view('profiles.show-profile', [
            'profileUser' => $user,
            'articles' => $user->articles()->latest()->get(),
            'reviews' => $user->reviews()->latest()->get(),
            'stories' => $user->stories()->latest()->get(),
            'poems' => $user->poems()->latest()->get(),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', [
            'profileUser' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $profileUser = $user;

        $attributes = request()->validate([
            'username' => [
                'string',
                'max:255',
                'alpha_dash',
            ],


            'name' => [
                'string',
                'max:255'
            ],

            'bio' => [
                'max:255'
            ],


            'avatar' => ['file'],

            'email' => [
                'string',
                'max:255',
                'email',
            ],
        ]);

        if (request()->has('avatar')) {
            $attributes['avatar_path'] = request()->file('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect(route('member-profile', $profileUser->username));
    }
}
