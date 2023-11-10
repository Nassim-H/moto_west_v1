<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="font-weight-bold">Bienvenue chez Moto West Tlemcen</h2>
                    <p>Rejoignez-nous sur <a href="https://www.facebook.com/people/Moto-west/100039082286514/" target="_blank">Facebook</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="font-weight-bold">Découvrez l'univers de l'équipement moto en Algérie</h2>
                    <p>Unique en Algérie : Des pièces d'origines et de l'équipement de marque.</p>
                    <button class="btn btn-primary">Découvrir tous nos produits</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="py-12 text-center">Marques</h2>
        <div class="row">
            @foreach ($marques as $marque)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 200px; height: 200px;">

                        <img src="{{ asset('images/' . $marque->logo) }}" alt="Image" class="align-self-center" style="max-height: 100%;">

                        <div class="card-body">
                            <div class="text-center"> <!-- Utilisez la classe text-center ici -->
                                <a href="/marques/{{ $marque->id }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

</x-app-layout>
