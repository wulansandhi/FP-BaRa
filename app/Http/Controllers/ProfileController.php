<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\MySqlConnection;
use App\Models\Dataprofile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
            ];
            $validator = Validator::make($request->all(), [
            'namaPengguna' => 'required',
            'email' => 'required|email',
            'tel' => 'required|numeric',
            'kelamin' => 'required',
            'tentangSaya' => 'required',
            ], $messages);
            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            }

            // ELOQUENT
            $dataprofile = New Dataprofile;
            $dataprofile->nama = $request->namaPengguna;
            $dataprofile->email = $request->email;
            $dataprofile->telephone = $request->tel;
            $dataprofile->jenis_kelamin = $request->kelamin;
            $dataprofile->biodata = $request->tentangSaya;

            $dataprofile->save();

            return redirect()->route('profile.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
