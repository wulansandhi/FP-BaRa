@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    @if (count($articles) > 0)
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
                        {{ $article->judul }}
                    </a>
                    (Views: {{ $article->views }})
                </li>
            @endforeach
        </ul>
    @else
        <p>No results found for the search query.</p>
    @endif
@endsection
