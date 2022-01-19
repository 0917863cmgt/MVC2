<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show(){
        return view('users.show');
    }

    public function edit(){
        return view('users.edit');
    }

    public function update(User $user){
        $attributes = request()->validate([
            'username' => 'string|max:50|min:3',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id), 'email', 'max:255'],
            'email_confirmation' => ['required', 'email', 'same:email', 'max:255'],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'profile_image' => 'image',
        ]);
        $attributes['role'] = 3;
        $attributes['password'] = bcrypt($attributes['password']);
        if(isset( $attributes['profile_image'])){
            $attributes['profile_image'] = request()->file('profile_image')->store('profile_images');
        }

        $user->update($attributes);

        return redirect('/user-details')->with('succes', 'Uw account is succesvol aangepast!');
    }
}
