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
    public function AddArticle(){
        return view('/Add');
    }
    public function traitementAdd(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'date_creation'=>'required',
            'la_une'=>'nullable|boolean',
            'image'=>'required',
        ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->la_une = $request->la_une;
        $article->image = $request->image;
        $article->save();
        return redirect('/articles')->with('status', 'Une article a bien été ajouté avec succès.');
    }
}
