@extends('layouts.app')

@section('content')
    {{-- @foreach ($articles as $article)
        <a href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
            {{ $article->judul }}
        </a>
    @endforeach --}}
    <div class="container-fluid"></div>
    <div class="row g-0">
        <div class="kiri col-sm-6 col-md-9">
            <h1 class="m-3">Disajikan untuk Anda</h1>
            <hr>

            <div class="container mt-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach ($articles as $key => $article)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <a
                                    href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                                    <img src="{{ Vite::asset('storage/app/' . $article->foto) }}"
                                        class="fotoSlide d-block w-100" alt="Image {{ $key + 1 }}">
                                </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>{{ $article->judul }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
            <hr class="hr my-5 align-self-center">
            <div class="row m-3">
                @foreach ($articles->sortByDesc('views')->take(9) as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a
                                href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                                <img src="{{ Vite::asset('storage/app/' . $article->foto) }}" class="card-img-top fotoGrid"
                                    alt="{{ $article->title }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->judul }}</h5>
                                <p class="card-text">{{ $article->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="kanan col-6 col-md-3">
            <h4 class="m-md-4">Paling Dicarssi</h4>
            <hr>
            <ul>
                @foreach ($articles->take(10) as $article)
                    <li class="mt-3">
                        <a class="textPD fw-bold fs-5"
                            href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                            {{ $article->judul }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
