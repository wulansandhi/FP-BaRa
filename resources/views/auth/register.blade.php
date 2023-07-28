@extends('layouts.app')

@section('content')
<div class="container-sm mx-15 my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xxl-7 border">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Tambah Admin</h4>
                </div>
                <hr class="my-5">

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nama') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Alamat Email') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Alamat Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Kata Sandi') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Masukkan Kata Sandi">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-5">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-start">{{ __('Konfirmasi Kata Sandi') }}</label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('home') }}" class="btn
        btn-outline-dark btn-lg mt-3"><i
                                class="bi-arrow-left-circle me-2"></i>
                            Kembali</a>
                    </div>
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg
        mt-3"><i
                                class="bi-check-circle me-2"></i>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
