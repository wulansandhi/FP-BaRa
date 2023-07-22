@extends('layouts.app')
@section('content')
    <div class="container-md mt-5">
        <form method="POST" action="#">
            @csrf
            <div class="mb-3 text-center">
                <h2>Profil</h2>
            </div>
            <hr>

            <div class="row mb-3 mt-5">
                <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nama') }}</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ $errors->any() ? old('name') : $user->name }}" placeholder="Masukkan Nama" readonly>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Alamat Email') }}</label>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ $errors->any() ? old('name') : $user->email }}" placeholder="Masukkan Alamat Email" readonly>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-2 d-grid text-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                </div>
                <div class="col-md-2 d-grid text-center">
                    <button type="submit" class="btn btn-dark btn-lg"><i class="bi-check-circle me-2"></i> Edit</button>
                </div>
            </div>
    </div>
@endsection
