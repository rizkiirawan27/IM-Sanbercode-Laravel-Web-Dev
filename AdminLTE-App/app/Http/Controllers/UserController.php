<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required','email',
            'password' => 'required','confirmed',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']); // Hash password baru
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profil berhasil diperbarui!');
    }

}
