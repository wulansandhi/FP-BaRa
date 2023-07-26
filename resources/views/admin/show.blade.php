@extends('layouts.app')

@section('content')
    {{-- <div class="container-fluid"> --}}
    <div class="row g-0">

        <div class="linkPath m-3 fs-5">
            <a href="{{ route('home') }}">Home > </a>
            <a href="#">{{ $kategoris->firstWhere('id', $article->kategori_id)->deskripsi }}</a>
        </div>
        <div class="kiriPage container col-md-8">
            <div class="headLight">
                <h1>{{ $article->judul }}</h1>
                <div class="author">
                    <p class="mb-0 fw-bold">{{ $article->penulis }}</p>
                    <p>{{ $article->tanggalRilis }}</p>
                </div>
                <img class="fotoPage mt-3" src="{{ Vite::asset('storage/app/' . $article->foto) }}" alt="">
                <p class="mt-3">{{ $article->isi }}</p>
            </div>
        </div>
        <div class="kananPage container col-sm-3">
            <p>asd</p>
        </div>
    </div>
    {{-- </div> --}}
@endsection
