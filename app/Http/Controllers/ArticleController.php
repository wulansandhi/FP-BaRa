<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Kategori;

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
            'articles' => $articles
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
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'tanggalRilis' => 'required|date',
            'isi' => 'required',
            'kategori' => 'required|exists:kategoris,id',
            // Make sure the selected category exists in the 'kategoris' table
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded image (optional)
        ]);

        // Redirect back to the form with errors if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle the file upload if an image is provided
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/images');
        }

        // Create the article using Eloquent and save it to the database
        Article::create([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'tanggalRilis' => $request->input('tanggalRilis'),
            'isi' => $request->input('isi'),
            'kategori_id' => $request->input('kategori'),
            'foto' => $fotoPath,
        ]);

        // Redirect to the article index page with a success message
        return redirect()->route('admin.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $title)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');
        $kategori = Kategori::findOrFail($id);
        return view('admin.show', [
            'pageTitle' => urldecode($title),
            'article' => $article,
            'kategoris' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}