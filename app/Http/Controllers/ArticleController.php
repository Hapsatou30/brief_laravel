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
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required',
            'la_une' => 'nullable|boolean',
            'image' => 'required'
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
    public function updateArticle($id)
    {
        $article=Article::find($id);
        return view('update',compact("article"));
    }

    public function traitementupdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:articles,id',
            'nom'=>'required',
            'description'=>'required',
            'date_creation'=>'required',
            'la_une'=>'nullable|boolean',
            'image'=>'required',
        ]);
        $article = Article::find($request->id);
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->la_une = $request->la_une;
        $article->image = $request->image;
        $article->update();
        return redirect('/articles')->with('status', 'Une article a bien été modifier avec succès.');
    }
    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article ->delete();
        return redirect('/articles')->with('status', 'L\'article a bien été supprimer avec succès.');
    }
    public function showDetails($id)
    {
        $article = Article::find($id);
        return view('show', ['article'=>$article]);
    }
}
