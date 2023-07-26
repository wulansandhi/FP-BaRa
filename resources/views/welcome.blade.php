@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="title-hero col-md-8 col-lg-6 text-center">
                <h1 class="mainTitle fw-bold fs-md-4 fs-lg-5">Ayo Mulai Membaca!</h1>
                <p class="fs-md-2 fs-lg-3"><span class="fw-bold">BaRa</span> udah sediakan tempat membaca berita terkini untuk
                    kamu.</p>
                <a href="{{ route('home') }}" class="btn btn-primary fs-md-2 fs-lg-3">Baca Sekarang</a>
            </div>
            <img src="{{ Vite::asset('resources/images/hero.png') }}" alt="" class="hero img-fluid bottom-0 end-0">
        </div>
    </div>
@endsection
