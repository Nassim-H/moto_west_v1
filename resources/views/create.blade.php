<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Piece') }}
        </h2>
    </x-slot>
    @csrf <!-- {{ csrf_field() }} -->

    <div class="d-flex justify-content-center align-items-center py-5">
        <form action="/pieces" method="post" class="w-50">
            <!-- Votre formulaire ici -->
            <form action="/pieces" method="post">

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
                    <textarea name="marque" id="marque" class="form-control"></textarea>
                </div>


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
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Ajouter l'article</button>

            </form>
        </form>
    </div>


</x-app-layout>




