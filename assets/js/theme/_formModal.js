var formModal = ( function( $ ) {

	let pub = {};

	pub.openModal = function() {
		let $formModalContent = $('#formModal').find('.modal-content__form');

		let form_id = $(this).data("formid");

		$formModalContent.html('<div class="loader">' + global.translations.loading + '</div>');
		$.get((global.ajax_url+'?action=get_form&form_id='+form_id), function(response){
			$formModalContent.html(response).fadeIn();
		});
	}

	pub._init = function() {
		$( document ).on( 'click', '.open__form', pub.openModal );
	}

	return pub;

} )(jQuery);