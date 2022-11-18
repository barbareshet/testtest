/**
 * Section Transition
 *
 * @package NHA
 */

var sectionTransition = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        AOS.init({
            delay: 50,
            duration: 1000
        });

    };

    return pub;

})(jQuery);