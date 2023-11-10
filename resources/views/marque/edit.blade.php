<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Marque') }} {{ $marque->id }}
        </h2>
    </x-slot>
    @csrf <!-- {{ csrf_field() }} -->

    <div class="d-flex justify-content-center align-items-center py-5">
        <form action="{{ route('marque.update', ['marque' => $marque]) }}" method="post" class="w-50" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Votre formulaire ici -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la marque :</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $marque->nom }}">
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Logo de la marque :</label>
                    <input type="file" name="image">
                </div>


                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Modifier l'article</button>

            </form>
        </form>
    </div>


</x-app-layout>



