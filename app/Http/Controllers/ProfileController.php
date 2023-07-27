<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $pageTitle = 'User Profile';
        $user = Auth::user();

        return view('profile', compact('pageTitle', 'user'));
    }

    public function edit()
    {
        $pageTitle = 'Edit Profile';
        $user = Auth::user();

        return view('profile', compact('pageTitle', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'tanggalLahir' => 'nullable|date',
                'telepon' => 'nullable|numeric',
                'jenisKelamin' => 'nullable|in:Laki-laki,Perempuan',
                'tentangSaya' => 'nullable|string',
            ],
            $messages
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (empty($request->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'Email harus diisi.'])
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email; // Update the email field
        $user->tanggalLahir = $request->tanggalLahir;
        $user->telepon = $request->telepon;
        $user->jenisKelamin = $request->jenisKelamin;
        $user->tentangSaya = $request->tentangSaya;

        $user->save();

        Alert::success('Changed Successfully', 'Profile Changed Successfully.');
        return redirect()->route('profile.edit');
    }

    public function editPassword()
    {
        $pageTitle = 'Edit Password';
        $user = Auth::user();

        return view('ubahPassword', compact('pageTitle', 'user'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->back()
                ->withErrors([
                    'current_password' => 'Kata Sandi Salah',
                ])
                ->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        Alert::success('Changed Successfully', 'Password Changed Successfully.');

        return redirect()->route('profile.editPassword');
    }
}
