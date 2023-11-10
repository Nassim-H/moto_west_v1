<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afficher produits') }}
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
                            @foreach ($piece->images as $image)
                                <img src="{{ asset('images/' . $image->url) }}" alt="{{ $piece->nom }}" class="img-thumbnail">
                            @endforeach

                            <a href="/produit/{{ $piece->id }}/show" class="btn btn-primary">Voir</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
