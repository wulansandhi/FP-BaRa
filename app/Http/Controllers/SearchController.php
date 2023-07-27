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

        // Perform the search query to fetch relevant articles
        $articles = Article::where('judul', 'like', "%$query%")
            ->orWhere('isi', 'like', "%$query%")
            ->get();

        return view('search_results', ['articles' => $articles, 'pageTitle' => $pageTitle]);
    }
}