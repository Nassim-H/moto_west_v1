<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Afficher la marque') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <!-- Section de la description de la marque -->
            <div class="card mb-4 mx-auto">
                <div class="card-body text-center d-flex flex-column align-items-center">
                    <h4 class="card-title">{{ $marque->nom }}</h4>
                    <img src="{{ asset('images/' . $marque->logo) }}" alt="Image" class="img-fluid mb-3" style="max-height: 200px;">
                    <p class="card-text">Une marque sportive, comme toutes les autres</p>
                </div>
            </div>
        </div>


        <!-- Grille de produits associés à chaque modèle -->
        <div class="row justify-content-center">
            <h5>Pièces associées à {{ $marque->nom }}</h5>
            @if ($marque->modeles->count() > 0)
                @foreach ($marque->modeles as $modele)
                    @if ($modele->pieces->count() > 0)
                        <h6>{{ $modele->nom }}</h6>
                        <div class="row">
                            @foreach ($modele->pieces as $piece)
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">{{ $piece->nom }}</h6>
                                            <p class="card-text">{{ $piece->description }}</p>
                                            <div class="image-gallery">
                                                <div class="gallery-container">
                                                    @foreach ($piece->images as $index => $image)
                                                        <img class="img-thumbnail{{ $index === 0 ? ' active' : '' }}" src="{{ asset('images/' . $image->url) }}" alt="Image de la pièce">
                                                    @endforeach
                                                </div>
                                                <div class="gallery-navigation">
                                                    <button class="prev-btn" onclick="changeImage(-1)">Précédent</button>
                                                    <button class="next-btn" onclick="changeImage(1)">Suivant</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <script>
                            let currentIndex = 0;
                            const imagesContainers = document.querySelectorAll('.gallery-container');

                            function changeImage(offset) {
                                currentIndex += offset;
                                if (currentIndex < 0) {
                                    currentIndex = imagesContainers.length - 1;
                                } else if (currentIndex >= imagesContainers.length) {
                                    currentIndex = 0;
                                }
                                updateGallery();
                            }

                            function updateGallery() {
                                imagesContainers.forEach((container, index) => {
                                    container.querySelectorAll('.img-thumbnail').forEach((image, imageIndex) => {
                                        image.style.display = index === currentIndex ? 'block' : 'none';
                                    });
                                });
                            }
                        </script>

                    @endif
                @endforeach
            @else
                <p>Aucun modèle associé à cette marque pour le moment.</p>
            @endif

        </div>
    </div>
</x-app-layout>
