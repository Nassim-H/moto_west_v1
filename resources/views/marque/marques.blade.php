<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afficher marques') }}
        </h2>
    </x-slot>

    <div class="container">
        <h2 class="mt-4 mb-4">Liste des Marques</h2>
        <div class="row">
            @foreach ($marques as $marque)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $marque->nom }}</h4>
                            <p class="card-text"><strong>Marque: {{ $marque->logo }}</strong>
                            </p>
                            <a href="/marques/{{ $marque->id }}/modifier" class="btn btn-primary">Modifier</a>
                            <form action="/marques/{{ $marque->id }}/delete" method="POST" style="display: inline;">
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
