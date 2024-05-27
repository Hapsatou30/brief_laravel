<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function liste_articles()
    {
        $articles = Article::all();
        return view('articles', compact('articles'));
    }
}
