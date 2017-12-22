(function () {

    'use strict';

    var $openNav = $('[data-open-nav]'),
        $navLink = $('[data-nav-link]'),
        $body = $('body'),
        $navigation = $('.navigation');

    $openNav.click(function (event) {

        if (!$body.is('.___open-nav')) {

            $body.addClass('___open-nav ___sticky-nav');

        } else {

            $body.removeClass('___open-nav');

            $navigation.one(transitionEvent, function () {
                $body.removeClass('___sticky-nav');
            });

        }

    });

    $navLink.click(function(event) {
        if ($body.is('.___open-nav')) {
            $body.removeClass('___open-nav');
            $navigation.one(transitionEvent, function () {
                $body.removeClass('___sticky-nav');
            });
        }
    });

})();
