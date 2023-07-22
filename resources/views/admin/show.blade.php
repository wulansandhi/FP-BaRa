@extends('layouts.app')

@section('content')
    <!-- show.blade.php -->
    <h2>{{ $article->judul }}</h2>
    <p>{{ $article->isi }}</p>
    <p>{{ $article->penulis }}</p>
@endsection
