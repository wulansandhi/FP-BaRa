@extends('layouts.app')
@section('content')
    <div class="container-md mt-5">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('POST')
            <div class="mb-3 text-center">
                <h2>Profil</h2>
            </div>
            <hr>

            <div class="row mb-3 mt-5">
                <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nama Pengguna') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="name" name="name" type="text" class="form-control"
                        value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="email" name="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                        placeholder="Masukkan Alamat Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tanggalLahir" class="col-md-4 col-form-label text-md-start">{{ __('Tanggal Lahir') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="tanggalLahir" name="tanggalLahir" type="date" class="form-control"
                        value="{{ $user->tanggalLahir }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="telepon" class="col-md-4 col-form-label text-md-start">{{ __('Telepon') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="telepon" name="telepon" type="text"
                        class="form-control @error('telepon') is-invalid @enderror" value="{{ $user->telepon ?? '' }}"
                        placeholder="Masukkan Nomor Telepon">

                    @error('telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="jenisKelamin" class="col-md-4 col-form-label text-md-start">{{ __('Jenis Kelamin') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="radioLakiLaki"
                            value="Laki-laki" {{ $user->jenisKelamin === 'Laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioLakiLaki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="radioPerempuan"
                            value="Perempuan" {{ $user->jenisKelamin === 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="tentangSaya" class="col-md-4 col-form-label text-md-start">{{ __('Tentang Saya') }}</label>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <textarea id="tentangSaya" name="tentangSaya" class="form-control" rows="7" cols="50">{{ $user->tentangSaya }}</textarea>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-md-2 d-grid text-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg"><i
                            class="bi-arrow-left-circle me-2"></i> Kembali</a>
                </div>
                <div class="col-md-2 d-grid text-center">
                    <button type="submit" class="btn btn-dark btn-lg"><i class="bi-check-circle me-2"></i>Simpan</button>
                </div>
            </div>
    </div>
@endsection
