$ = require('jquery');

(function () {

    'use strict';

    var $scrollButton = $('[data-scroll-to-top]'),
        $scrollArea = $('[data-scroll-to-top-area]');

    if ( $scrollButton.length ) {

        $scrollArea.scroll(function() {
            var scrolled = $scrollArea.scrollTop();

            if ( scrolled > 100 ) {
                $scrollButton.addClass('___is-active');
            } else {
                $scrollButton.removeClass('___is-active');
            }
        });

        $scrollButton.click(function() {
            $scrollArea.animate({
                scrollTop: 0
            }, 250);
        });

    }

})();
