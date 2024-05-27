<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class itemController extends Controller
{
    public function listItems()
    {
        $items = item::all();
        return view('items', compact('items'));
    }
    public function addItems(){
        return view('/add');
    }
    public function processingAdd(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:items,id',
            'nom' => ['required', 'regex:/^[a-zA-Z\s\-\'\,\.]+$/'], // Permet les lettres, espaces, tirets, apostrophes, virgules et points
            'description' => ['required', 'regex:/^[a-zA-Z\s\-\'\,\.]+$/'], // Permet les lettres, espaces, tirets, apostrophes, virgules et points
            'date_creation' => 'required',
            'la_une' => 'nullable|boolean',
            'image' => ['required', 'url'], // Doit être une URL valide
        ], [
            'nom.regex' => 'Le champ nom ne doit contenir que des lettres, espaces, tirets, apostrophes, virgules et points.',
            'description.regex' => 'Le champ description ne doit contenir que des lettres, espaces, tirets, apostrophes, virgules et points.',
            'image.url' => 'Le champ image doit être une URL valide.',
        ]);
        
        
        $item = new item();
        $item->nom = $request->nom;
        $item->description = $request->description;
        $item->date_creation = $request->date_creation;
        $item->la_une = $request->la_une;
        $item->image = $request->image;
        $item->save();
        return redirect('/items')->with('status', 'Une item a bien été ajouté avec succès.');
    }
    public function updateItem($id)
    {
        $item=item::find($id);
        return view('update',compact("item"));
    }

    public function processingUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:items,id',
            'nom' => ['required', 'regex:/^[a-zA-Z\s\-\'\,\.]+$/'], // Permet les lettres, espaces, tirets, apostrophes, virgules et points
            'description' => ['required', 'regex:/^[a-zA-Z\s\-\'\,\.]+$/'], // Permet les lettres, espaces, tirets, apostrophes, virgules et points
            'date_creation' => 'required',
            'la_une' => 'nullable|boolean',
            'image' => ['required', 'url'], // Doit être une URL valide
        ], [
            'nom.regex' => 'Le champ nom ne doit contenir que des lettres, espaces, tirets, apostrophes, virgules et points.',
            'description.regex' => 'Le champ description ne doit contenir que des lettres, espaces, tirets, apostrophes, virgules et points.',
            'image.url' => 'Le champ image doit être une URL valide.',
        ]);        
        $item = item::find($request->id);
        $item->nom = $request->nom;
        $item->description = $request->description;
        $item->date_creation = $request->date_creation;
        $item->la_une = $request->la_une;
        $item->image = $request->image;
        $item->update();
        return redirect('/items')->with('status', 'Une item a bien été modifier avec succès.');
    }
    public function deleteItem($id)
    {
        $item = item::find($id);
        $item ->delete();
        return redirect('/items')->with('status', 'L\'item a bien été supprimer avec succès.');
    }
    public function showDetails($id)
    {
        $item = item::find($id);
        return view('show', ['item'=>$item]);
    }
}
