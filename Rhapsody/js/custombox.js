$(function() {
    
    "use strict";
    
    var $window = $(window);

    if ( $window.width() < 360 ) {
        $(document.getElementById('tooltip')).css('right', 0);
    }
    if( navigator.appVersion.indexOf("MSIE 8.") == -1 ) {
        $(document.getElementById('tooltip')).animate({
            top:    '-45px',
            opacity: 1
        }, 600);
    }

    $('.sign').on('click', function ( e ) {
        $.fn.custombox( this, {
            effect: 'sign'
        });
        e.preventDefault();
    });

});