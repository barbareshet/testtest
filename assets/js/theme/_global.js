/**
 *  Google Maps
 *
 *  Generates a Google Map on the page.
 */
var util = (function ($) {

    var pub = {}; // public facing functions

    pub.formatDate = function(date) {
        var myDate = new Date(date);
        return myDate.toDateString().split(' ').slice(1).join(' ');
    }

    pub.getQueryString = function() {
        var result = {},
            queryString = location.search.slice(1),
            re = /([^&=]+)=([^&]*)/g,
            m;

        while (m = re.exec(queryString)) {
            result[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
        }

        return result;
    }

    return pub;

}(jQuery));