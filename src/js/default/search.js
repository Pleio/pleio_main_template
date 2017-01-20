$ = require('jquery');

(function () {

    'use strict';

    var $searchInput = $('[data-search-input]'),
        $searchResults = $('.search-results');

    $searchInput.on('keyup keydown', function(a) {
        if ( $(this).val().length > 0 ) {
            $searchResults.addClass('___is-visible');
            $(this).closest('.card').find('.read-more').removeClass('___disabled').addClass('___enabled');
        } else {
            $searchResults.removeClass('___is-visible');
            $(this).closest('.card').find('.read-more').addClass('___disabled').removeClass('___enabled');
        }
    });

})();
