import $ from 'jquery';
window.$ = window.jQuery = $;

import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';

//Code d'initialisation pour Select2
$(document).ready(function() {
    $('.select2').select2({
        tags: true, // Permet d'ajouter de nouveaux tags
        tokenSeparators: [',', ' '], // Définit les séparateurs de token pour la création de tags
        allowClear: true, // Autorise l'effacement des éléments sélectionnés
    });
});