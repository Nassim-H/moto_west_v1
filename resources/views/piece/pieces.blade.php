<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afficher pièces') }}
        </h2>
    </x-slot>

    <div class="container">
        <h2 class="mt-4 mb-4">Liste des Pièces</h2>
        <div class="row">
            @foreach ($pieces as $piece)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $piece->nom }}</h4>
                            <p class="card-text"><strong>Modèle:</strong>
                                @isset($piece->modele)
                                    {{ $piece->modele->nom }}
                                @else
                                    Modèle non défini
                                @endisset
                            </p>
                            <p class="card-text"><strong>Marque:</strong>
                                @isset($piece->modele)
                                    {{ $piece->modele->marque->nom }}
                                @else
                                    Marque non défini
                                @endisset
                            </p>
                            <p class="card-text"><strong>Cylindrée:</strong> {{ $piece->modele->cylindree }}</p>
                            <p class="card-text"><strong>Quantité:</strong> {{ $piece->quantite }}</p>
                            <p class="card-text"><strong>Prix:</strong> {{ $piece->prix }}</p>
                            <p class="card-text"><strong>Lieu:</strong> {{ $piece->localisation->lieu }}</p>
                            <p class="card-text"><strong>Ville:</strong> {{ $piece->localisation->ville }}</p>
                            <p class="card-text"><strong>Pays:</strong> {{ $piece->localisation->pays }}</p>
                            <!-- Ajoutez une boucle foreach pour afficher les images -->
                            <div class="image-gallery">
                                @foreach ($piece->images as $image)
                                    <img class = "img-thumbnail" src="{{ asset('images/' . $image->url) }}" alt="Image de la pièce">
                                @endforeach
                            </div>
                            <a href="/pieces/{{ $piece->id }}/modifier" class="btn btn-primary">Modifier</a>
                            <form action="/pieces/{{ $piece->id }}/delete" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
