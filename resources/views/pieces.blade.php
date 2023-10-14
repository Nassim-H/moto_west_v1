<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afficher pièces') }}
        </h2>
    </x-slot>



<div class="container">
    <h2 class="mt-4 mb-4">Liste des Pièces</h2>
    @foreach ($pieces as $piece)
        <div class="piece-list">
            <h4 class="piece-title">{{ $piece->nom }}</h4>
            <div class="row">
                <div class="col-md-4 piece-details">
                    <strong>Modèle:</strong>
                    @isset($piece->modele)
                    {{ $piece->modele->nom }}
                    @else
                        Modèle non défini
                    @endisset<br>
                    <strong>Marque:</strong> @isset($piece->modele)
                        {{ $piece->modele->marque->nom }}
                    @else
                        Marque non défini
                    @endisset<br>
                    <strong>Cylindrée:</strong> {{ $piece->modele->cylindree }}<br>
                </div>
                <div class="col-md-4 piece-details">
                    <strong>Quantité:</strong> {{ $piece->quantite }}<br>
                    <strong>Prix:</strong> {{ $piece->prix }}<br>
                </div>
                <div class="col-md-2 piece-details">
                    <strong>Lieu:</strong> {{ $piece->localisation->lieu }}<br>
                    <strong>Ville:</strong> {{ $piece->localisation->ville }}<br>
                    <strong>Pays:</strong> {{ $piece->localisation->pays }}<br>
                </div>
                <div class="col-md-2 piece-details">
                    <strong> <a href="/pieces/{{ $piece->id }}/delete">Supprimer</a></strong>
                    <strong><a href="/pieces/{{ $piece->id }}/modifier">Modifier</a></strong>
                </div>
        </div>
    @endforeach
</div>

</x-app-layout>
