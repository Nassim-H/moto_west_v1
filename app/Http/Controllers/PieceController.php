<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Localisation;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function create()
    {
        return view('piece/create');
    }


    public function store(Request $request){
        //dd($request->all());
        // Recherchez le modèle par nom
        $nom_modele = strtolower($request->modele);
        $cylindree = $request->cylindree;
        $modele = Modele::where('nom', $nom_modele)->first();

        $nom_lieu = strtolower($request->lieu);
        $lieu = Localisation::where('lieu', $nom_lieu)->first();
        if (!$modele) {
            $modele = new Modele();
            $modele->cylindree = $cylindree;
            $modele->nom = strtolower($nom_modele);
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
        $piece->prix = $request->prix;
        $piece->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image) {
                    $originalName = $image->getClientOriginalName();
                    $image->move(public_path('images'), $originalName);

                    // Enregistrez l'URL de l'image dans la base de données
                    $imageModel = new Image();
                    $imageModel->url = $originalName; // Remplacez par l'URL réelle de l'image
                    $imageModel->id_piece = $piece->id;
                    try {
                        $imageModel->save();
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                }
            }
        }}

        return redirect('pieces');

    }

    public function index()
    {
        $pieces = Piece::all(); // Récupérer toutes les pièces depuis la base de données

        return view('piece/pieces', ['pieces' => $pieces]);
    }

    public function index2()
    {
        $pieces = Piece::all(); // Récupérer toutes les pièces depuis la base de données

        return view('piece/produits', ['pieces' => $pieces]);
    }

    public function show($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        return view('piece', ['piece' => $piece]);
    }

    public function edit($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        return view('piece/edit', ['piece' => $piece]);
    }

    public function update(Request $request, $id) {

        // Recherche de la pièce à mettre à jour
        $piece = Piece::find($id);


        if (!$piece) {
            // Gérer le cas où la pièce n'est pas trouvée
            return redirect('piece/pieces')->with('error', 'Pièce non trouvée');
        }

        // Recherche ou création du modèle
        $nom_modele = strtolower($request->modele);
        $cylindree = $request->cylindree;
        $modele = Modele::firstOrNew(['nom' => $nom_modele]);

        // Si le modèle n'existait pas, enregistrez-le
        if (!$modele->id) {
            $modele->cylindree = $cylindree;
            $modele->nom = $nom_modele;

            // Recherche de la marque associée ou création si elle n'existe pas
            $marque = Marque::firstOrNew(['nom' => $request->marque]);
            if (!$marque->id) {
                $marque->save();
            }

            $modele->id_marque = $marque->id;
            $modele->save();
        }

        // Recherche ou création de la localisation
        $nom_lieu = strtolower($request->lieu);
        $lieu = Localisation::firstOrNew(['lieu' => $nom_lieu]);

        // Si la localisation n'existait pas, enregistrez-la
        if (!$lieu->id) {
            $lieu->lieu = $nom_lieu;
            $lieu->pays = strtolower($request->pays);
            $lieu->ville = strtolower($request->ville);
            $lieu->save();
        }

        // Mise à jour des données de la pièce
        $piece->nom = strtolower($request->nom);
        $piece->quantite = $request->quantite;
        $piece->id_modele = $modele->id;
        $piece->id_localisation = $lieu->id;

        $piece->save();

        return redirect('piece//pieces')->with('success', 'Pièce mise à jour avec succès');
    }


    public function destroy($id)
    {
        $piece = Piece::find($id); // Récupérer la pièce avec l'id correspondant depuis la base de données

        if (!$piece) {
            // Gérer le cas où la pièce n'a pas été trouvée
            return redirect('pieces');
        }

        // Supprimer les images associées du système de fichiers
        foreach ($piece->images as $image) {
            $imagePath = public_path('images/' . $image->url);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Supprimez le fichier du dossier public
            }
        }

        // Supprimer les images associées de la base de données
        $piece->images()->delete();

        // Supprimer la pièce
        $piece->delete();

        return redirect('pieces');
    }

}
