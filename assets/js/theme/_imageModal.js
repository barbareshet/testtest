
var imageModal = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        $('.image-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var image_url = button.data('image-url');
            var image_alt = button.data('image_alt');

            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal__img').attr('src', image_url).attr('alt', image_alt);
        });

    };

    return pub;

}(jQuery));