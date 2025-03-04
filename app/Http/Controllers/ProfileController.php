<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'nullable',
        ]);

        if ($validatedData['password']) {
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::where('id', auth()->user()->id)->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'password' => $validatedData['password'],
            ]);
        } else {
            User::where('id', auth()->user()->id)->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
            ]);
        }

        return redirect()->route('dashboard.profile.index')->with('toast_success', 'Profile updated successfully.');
    }
}
