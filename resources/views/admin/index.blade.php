@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.create') }}" class="btn btn-secondary">Tambah Artikel</a>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive border p-4 rounded-3">
            <table class="table table-bordered table-hover table-striped" id="articleTable">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal Rilis</th>
                        <th>Isi</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $articles)
                        <tr>
                            <td>{{ $articles->judul }}</td>
                            <td>{{ $articles->penulis }}</td>
                            <td>{{ $articles->tanggalRilis }}</td>
                            <td>{{ Str::limit($articles->isi, 100, '...') }}</td>
                            <td>{{ $articles->kategori->deskripsi }}</td>
                            <td>@include('admin.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#articleTable').DataTable();
        });
    </script>
@endpush
