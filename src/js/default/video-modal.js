$ = require('jquery');

(function () {

    'use strict';

    var $videoLink = $('[data-video-id]');

    if ( $videoLink ) {

        var getUrlVar = function() {
            var variables = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
                function(m,key,value) {
                    variables[key] = value;
                });
            return variables;
        }

        var $body = $('body');
        var autoplay = getUrlVar()['autoplay'];

        $videoLink.on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            var videoType = $this.data('video-type');
            var videoId = $this.data('video-id');

            // Create the video iFrame
            var $videoFrame = createVideoFrame(videoType, videoId);

            // Create the vido modal and show it
            showVideoModal($videoFrame);
        });

        $body.on('click', '.video-modal__close, .video-modal__overlay', function () {
            removeVideoModal();
        });

        $(document).on('keydown', function(e) {
            if (e.keyCode == 27) { // Escape key
                removeVideoModal();
            }
        });


        /*
         * Helper functions
         */
        var createVideoFrame = function(videoType, videoId) {
            switch (videoType) {
                case 'vimeo':
                    return '<iframe src="https://player.vimeo.com/video/' + videoId + '?title=0&byline=0&portrait=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen />';

                    break;

                case 'youtube':
                    return '<iframe src="http://www.youtube.com/embed/' + videoId + '?autoplay=1&modestbranding=1&rel=0&showinfo=0" frameborder="0" />';

                    break;
            }
        }

        var showVideoModal = function($videoFrame) {
            var $videoModal =  "<div class='video-modal'>";
                    $videoModal += "<div class='container'>";
                        $videoModal += "<div id='video-modal__box' class='video-modal__box'>";
                            $videoModal += "<span class='video-modal__close'></span>";
                        $videoModal += "</div>";
                    $videoModal += "</div>";
                    $videoModal += "<div class='video-modal__overlay'></div>";
                $videoModal += "</div>";

            $($videoModal).appendTo('body').fadeIn(250);

            setTimeout( function(){
                $('#video-modal__box').append($videoFrame);
            }, 100);
        }

        var removeVideoModal = function() {
            $('.video-modal').fadeOut(250).promise().done(function () {
                $(this).remove();
            });
        }

        /*
         * Autoplay
         * - At the bottom due to race condition
         */
        if ( autoplay ) {
            $videoLink.click();
        }
    }

})();
