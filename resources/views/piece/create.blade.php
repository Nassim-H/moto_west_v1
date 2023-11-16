<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Piece') }}
        </h2>
    </x-slot>
    @csrf <!-- {{ csrf_field() }} -->

    <div class="d-flex justify-content-center align-items-center py-5">
        <form action="/pieces" method="post" class="w-50" enctype="multipart/form-data">
            <!-- Votre formulaire ici -->

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la pièce :</label>
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Modèle de la moto :</label>
                    <textarea name="modele" id="modele" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="cylindree" class="form-label">Cylindrée :</label>
                    <textarea name="cylindree" id="cylindree" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">Marque de la moto :</label>
                    <input type="text" name="marque" id="marque" class="form-control" list="marqueSuggestions">
                    <datalist id="marqueSuggestions">
                        @foreach($marques as $marque)
                            <option value="{{ $marque->nom }}">
                        @endforeach
                    </datalist>
                </div>
            <div class="mb-3">
                <label for="marque_select" class="form-label">Autre champ :</label>
                <select name="marque_select" id="marque_select" class="form-control">
                    @foreach($marques as $marque)
                        <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @endforeach
                </select>
            </div>

            <script src="{{ asset('js/app.js') }}"></script>
            <script>
                const marquesData = {!! $marques->toJson() !!};
            </script>

                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantité :</label>
                    <input type="number" name="quantite" id="quantite" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix :</label>
                    <input type="number" name="prix" id="prix" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu de stockage :</label>
                    <textarea name="lieu" id="lieu" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="ville" class="form-label">Ville :</label>
                    <input type="text" name="ville" id="ville" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="pays" class="form-label">Pays :</label>
                    <input type="text" name="pays" id="pays" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Images de la pièce :</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Ajouter l'article</button>

            </form>
    </div>


</x-app-layout>




