/*
 * Name : animated.js
 * Author: Enza Lombardo
 * Description : L'animation CSS se déclanche au scroll (quant il est visible)
 * Version : 1.0
 */


(function($) {

    $(document).ready(function() {
        $('.box-left').addClass("hidden").viewportChecker({
            classToAdd: 'visible animated fadeInDown',
            offset: 300
        });

        $('.box-right').addClass("hidden").viewportChecker({
            classToAdd: 'visible animated fadeInUp',
            offset: 300
        });
    });

})(jQuery);
