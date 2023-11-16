import './bootstrap';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import Alpine from 'alpinejs';
import $ from 'jquery';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    const marques = marquesData;

    $('#marque').on('input', function() {
        var keyword = $(this).val();
        var suggestionsList = $('#marqueSuggestions');
        suggestionsList.empty();

        if (keyword.length >= 2) {
            $.each(marques, function(index, marque) {
                if (marque.nom.toLowerCase().includes(keyword.toLowerCase())) {
                    suggestionsList.append('<option value="' + marque.nom + '">');
                }
            });
        }
    });
});
