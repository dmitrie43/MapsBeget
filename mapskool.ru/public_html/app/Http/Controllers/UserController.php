<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::all();
        return view('profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                ],
        ]);

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        return redirect()->route('profile');
    }
}
