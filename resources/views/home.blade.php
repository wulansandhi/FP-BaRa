@extends('layouts.app')

@section('content')
    @foreach ($articles as $article)
        <a href="{{ route('articles.show', ['id' => $article->id, 'title' => urlencode($article->judul)]) }}">
            {{ $article->judul }}
        </a>
    @endforeach
@endsection
