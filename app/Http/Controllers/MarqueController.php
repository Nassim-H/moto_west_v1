<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    function index(){
        $marques = Marque::all(); // Récupérer toutes les pièces depuis la base de données

        return view('welcome', ['marques' => $marques]);
    }

    function index2(){
        $marques = Marque::all(); // Récupérer toutes les pièces depuis la base de données

        return view('marque.marques ', ['marques' => $marques]);
    }

    function create(){
        return view('marque.create');
    }


    function store(Request $request){
        $marque = new Marque();
        $marque->nom = strtolower($request->nom);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        $image = $request->file('image');
        $originalName = $image->getClientOriginalName(); // Récupérez le nom d'origine avec l'extension
        $imageNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME); // Récupérez le nom sans l'extension

        $image->move(public_path('images'), $originalName); // Stockez l'image dans le répertoire public/images
        $marque->logo = $originalName;
        $marque->save();

        return redirect('/marques');
    }

    function edit($id){
        $marque = Marque::find($id);
        return view('marque.edit', ['marque' => $marque]);
    }

    function update(Request $request, $id){
        $marque = Marque::find($id);
        $marque->nom = $request->nom;

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            ]);

            $image = $request->file('image');
            $originalName = $image->getClientOriginalName(); // Récupérez le nom d'origine avec l'extension
            $imageNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME); // Récupérez le nom sans l'extension

            $image->move(public_path('images'), $originalName); // Stockez l'image dans le répertoire public/images
            $marque->logo = $originalName;
        }

        $marque->save();

        return redirect('/marques');
    }

    function destroy($id){
        $marque = Marque::find($id);
        $marque->delete();

        return redirect('/marques');
    }

    function show($id){
        $marque = Marque::find($id);
        return view('marque.show', ['marque' => $marque]);
    }
}
