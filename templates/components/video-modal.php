<?php
/**
 * Video Modal template part
 *
 * @package NHA
 */

?>

<div class="modal fade videos-modal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <button type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
        <svg class="icon icon-icon-close"><use xlink:href="#icon-icon-close"></use></svg>
    </button>
    <div class="container-fluid">
        <div class="modal-dialog modal-dialog--video modal-dialog-centered" role="document">
            <div class="modal-content pb-0">
                <div class="embed-responsive embed-responsive-16by9" id="videosWrapper">
                    <iframe src="" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
