<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Piece') }} {{ $piece->id }}
        </h2>
    </x-slot>
    @csrf <!-- {{ csrf_field() }} -->

    <div class="d-flex justify-content-center align-items-center py-5">
        <form action="{{ route('piece.update', ['piece' => $piece]) }}" method="post" class="w-50">
            @csrf
            @method('PATCH')
            <!-- Votre formulaire ici -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la pièce :</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $piece->nom }}">
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Modèle de la moto :</label>
                    <textarea name="modele" id="modele" class="form-control">{{ $piece->modele->nom }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cylindree" class="form-label">Cylindrée :</label>
                    <textarea name="cylindree" id="cylindree" class="form-control">{{ $piece->modele->cylindree }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">Marque de la moto :</label>
                    <textarea name="marque" id="marque" class="form-control">{{ $piece->modele->marque->nom }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantité :</label>
                    <input type="number" name="quantite" id="quantite" class="form-control" value="{{ $piece->quantite }}">
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix :</label>
                    <input type="number" name="prix" id="prix" class="form-control" value="{{ $piece->prix }}">
                </div>

                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu de stockage :</label>
                    <textarea name="lieu" id="lieu" class="form-control">{{ $piece->localisation->lieu  }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="ville" class="form-label">Ville :</label>
                    <input type="text" name="ville" id="ville" class="form-control" value="{{ $piece->localisation->ville  }}">
                </div>

                <div class="mb-3">
                    <label for="pays" class="form-label">Pays :</label>
                    <input type="text" name="pays" id="pays" class="form-control" value="{{ $piece->localisation->pays  }}">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Modifier l'article</button>

            </form>
        </form>
    </div>


</x-app-layout>



