var tabs = (function ($) {

    let pub = {};

    pub.addActiveClass = function () {
        $('.tab__accordion').removeClass('active');
        $('.tab-pane').removeClass('active');
        $(this).addClass('active');
        $(this).next().addClass('active');
    }

    pub._init = function () {
        $(document).on('click', '.tab__accordion', pub.addActiveClass);
    }

	pub._init = function () {
	    $(document).on('click', '.tab__accordion', pub.addActiveClass);
	}
    
    return pub;

}(jQuery));