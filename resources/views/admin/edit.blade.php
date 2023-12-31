@extends('layouts.app')
@section('content')
    <div class="container-sm mt-5">
        <form method="POST" action="{{ route('admin.update', ['id' => $article->id]) }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-newspaper fs-1"></i>
                        <h4>Edit Artikel</h4>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input class="form-control @error('judul')
            is-invalid @enderror" type="text"
                                name="judul" id="judul" value="{{ old('judul', $article->judul) }}"
                                placeholder="Masukkan Judul Artikel">
                            @error('judul')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input class="form-control @error('penulis')
            is-invalid @enderror" type="text"
                                name="penulis" id="penulis" value="{{ old('penulis', $article->penulis) }}"
                                placeholder="Masukkan Nama Penulis">
                            @error('penulis')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="tanggalRilis" class="form-label">Tanggal Rilis</label>
                            <input id="tanggalRilis" name="tanggalRilis" type="date" class="form-control" value="{{ old('tanggalRilis', $article->tanggalRilis) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea id="isi" name="isi" class="form-control @error('isi') is-invalid
                                @enderror" rows="20" placeholder="Masukkan Isi Artikel">{{ old('isi', $article->isi) }}</textarea>
                            @error('isi')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('kategori', $article->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->kode . ' - ' . $kategori->deskripsi }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto"
                                id="foto">
                            @error('foto')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('admin.index') }}" class="btn
            btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i>
                                Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-success btn-lg
            mt-3"><i
                                    class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
