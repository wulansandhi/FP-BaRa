@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 100vh;">
        <h1 class="text-center mt-3">Search Results</h1>

        <div class="row">
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                    <div class="col-md-12 mb-4">
                        <div class="card flex-row">
                            <img src="{{ Vite::asset('storage/app/' . $article->foto) }}" class="card-img-left"
                                style="max-width: 200px; object-fit: cover;" alt="{{ $article->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->judul }}</h5>
                                <p class="card-text">{{ $article->isi }}</p>
                                <a href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}"
                                    class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No results found for the search query.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
