<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Marque') }}
        </h2>
    </x-slot>
    @csrf <!-- {{ csrf_field() }} -->

    <div class="d-flex justify-content-center align-items-center py-5">
            <!-- Votre formulaire ici -->
            <form action="/marques" method="post" class="w-50" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la marque :</label>
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>

                <div class="mb-3">

                <input type="file" name="image">
                    <button type="submit">Télécharger</button>
                </div>


                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Ajouter la marque</button>

            </form>
    </div>


</x-app-layout>




