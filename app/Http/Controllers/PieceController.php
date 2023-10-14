<?php

namespace App\Http\Controllers;

use App\Models\Localisation;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function create()
    {
        return view('create');
    }


    public function store(Request $request){
        // Recherchez le modèle par nom
        $nom_modele = strtolower($request->modele);
        $cylindree = $request->cylindree;
        $modele = Modele::where('nom', $nom_modele)->first();

        $nom_lieu = strtolower($request->lieu);
        $lieu = Localisation::where('lieu', $nom_lieu)->first();
        if (!$modele) {
            $modele = new Modele();
            $modele->cylindree = $cylindree;
            $modele->nom = $nom_modele;
            $marque = Marque::where('nom', $request->marque)->first();
            if (!$marque){
                $marque = new Marque();
                $marque->nom = $request->marque;
                $marque->save();
            }
            $modele->id_marque = $marque->id;
            $modele->save();
        }
        if (!$lieu){
            $lieu = new Localisation();
            $lieu->lieu = strtolower($request->lieu);
            $lieu->pays = strtolower($request->pays);
            $lieu->ville = strtolower($request->ville);
            $lieu->save();
        }

        $piece = new Piece;
        $piece->nom = strtolower($request->nom);
        $piece->quantite = $request->quantite;
        $piece->id_modele = $modele->id;
        $piece->id_localisation = $lieu->id;

        $piece->save();

        return redirect('/pieces');

    }

    public function index()
    {
        $pieces = Piece::all(); // Récupérer toutes les pièces depuis la base de données

        return view('pieces', ['pieces' => $pieces]);
    }

    public function show($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        return view('piece', ['piece' => $piece]);
    }

    public function edit($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        return view('edit', ['piece' => $piece]);
    }

    public function update(Request $request, $id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        $piece->nom = strtolower($request->nom);
        $piece->quantite = $request->quantite;
        $piece->save();

        return redirect('/pieces');
    }

    public function destroy($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        $piece->delete();

        return redirect('/pieces');
    }

}
