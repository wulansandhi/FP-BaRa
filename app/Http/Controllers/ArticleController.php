<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Article List';
        // ELOQUENT
        $articles = Article::all();
        return view('admin.index', [
            'pageTitle' => $pageTitle,
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Artikel';

        // ELOQUENT
        $kategori = Kategori::all();

        return view('admin.create', compact('pageTitle', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'tanggalRilis' => 'required|date',
            'isi' => 'required',
            'kategori' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/images');
        }

        $article = new Article();
        $article->judul = $request->judul;
        $article->penulis = $request->penulis;
        $article->tanggalRilis = $request->tanggalRilis;
        $article->isi = $request->isi;
        $article->kategori_id = $request->kategori;
        if ($fotoPath != null) {
            $article->foto = $fotoPath;
        }
        $article->save();
        Alert::success('Added Successfully', 'Article Added Successfully.');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $title)
    {
        $articles = Article::All();
        $article = Article::findOrFail($id);
        $article->increment('views');
        $kategori = Kategori::findOrFail($id);
        return view('admin.show', [
            'pageTitle' => urldecode($title),
            'article' => $article,
            'kategoris' => $kategori,
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Artikel';

        // ELOQUENT
        $article = Article::findOrFail($id);
        $kategori = Kategori::all();

        return view('admin.edit', compact('pageTitle', 'article', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'tanggalRilis' => 'required|date',
            'isi' => 'required',
            'kategori' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $article = Article::findOrFail($id);

        $fotoPath = $article->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            if ($fotoPath && Storage::exists($fotoPath)) {
                Storage::delete($fotoPath);
            }
            $fotoPath = $foto->store('public/images');
        }

        $article->judul = $request->judul;
        $article->penulis = $request->penulis;
        $article->tanggalRilis = $request->tanggalRilis;
        $article->isi = $request->isi;
        $article->kategori_id = $request->kategori;
        $article->foto = $fotoPath;

        $article->save();
        Alert::success('Changed Successfully', 'Article Changed Successfully.');

        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {
        Article::find($id)->delete();
        Alert::success('Deleted Successfully', 'Article Deleted Successfully.');

        return redirect()->route('admin.index');
    }

}
