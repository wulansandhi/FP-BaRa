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
            <h3 class="m-3">Disajikan untuk Anda</h3>
            <hr>

            <div class="container mt-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach ($articles as $key => $article)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <<a
                                    href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                                    <img src="{{ Vite::asset('resources/images/hero.png') }}" class="d-block w-100"
                                        alt="Image {{ $key + 1 }}">
                                    </a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $article->judul }}</h5>
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

            <!-- Add Bootstrap JS link here -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        </div>
        <div class="kanan col-6 col-md-3">
            <h3 class="m-3">Paling Dicarssi</h3>
            <hr>

            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                        {{ $article->judul }}
                    </a>
                </li>
            @endforeach
        </div>
    </div>
@endsection
