/**
 *  Google Maps
 *
 *  Generates a Google Map on the page.
 */
var lazyLoad = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

    	window.lazyLoadInstance = new LazyLoad({
		    elements_selector: ".lazy"
		  });

    }

    return pub;

}(jQuery));