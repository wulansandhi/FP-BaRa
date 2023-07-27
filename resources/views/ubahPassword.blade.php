@extends('layouts.app')

@section('content')
    <div class="container-md mt-5">
        <form method="POST" action="{{ route('profile.updatePassword', $user->id) }}">
            @csrf
            <div class="mb-5 text-center">
                <i class="bi bi-key fs-1"></i>
                <h2>Edit Kata Sandi</h2>
                <hr>
            </div>

            <div class="row mb-3">
                <label for="current_password" class="col-md-4 col-form-label text-md-start">Kata Sandi Lama</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="current_password" name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" required autocomplete="current_password" placeholder="Enter Current Password">

                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="new_password" class="col-md-4 col-form-label text-md-start">Kata Sandi Baru</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="new_password" name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" required autocomplete="new_password" placeholder="Enter New Password">

                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-start">Konfirmasi Kata Sandi Baru</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control" required autocomplete="new_password_confirmation" placeholder="Confirm New Password">
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-md-2 d-grid text-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg"><i class="bi-arrow-left-circle me-2"></i> Kembali</a>
                </div>
                <div class="col-md-2 d-grid text-center">
                    <button type="submit" class="btn btn-dark btn-lg"><i class="bi-check-circle me-2"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
