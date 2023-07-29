<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $pageTitle = 'Pencarian: ' . $query;

        $articles = Article::where('judul', 'like', "%$query%")
            ->orWhere('isi', 'like', "%$query%")
            ->orWhere('penulis', 'like', "%$query%")
            ->get();

        return view('search_results', ['articles' => $articles, 'pageTitle' => $pageTitle]);
    }
}