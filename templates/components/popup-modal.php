<?php
/**
 * Popup Modal template part
 *
 * @package NHA
 */

if(!is_front_page()) return false;

$isPopupActive = get_field('pop-up_active', 'option');
if(!$isPopupActive) return false;

$popupKey = get_field('pop-up_key', 'option');
$popupForm = get_field('pop-up_form', 'option');
$popupContent = get_field('pop-up_content', 'option');
$popupBackgroundColor = get_field('pop-up_background-Color', 'option');
?>
<div 
	class="modal fade"
	id="popupModal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="formModalLabel"
	aria-hidden="true"
	data-popup-key="<?php echo $popupKey ?>"
	data-form-id="<?php echo $popupForm ?>">
	<button type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
		<svg class="icon icon-icon-close"><use xlink:href="#icon-icon-close"></use></svg>
	</button>
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content popup-content bg-dark border-0">
			<div class="container">
				<div class="row align-items-stretch">
					<div class="col-lg-7 p-4 p-xl-5 popup-content__copy">
						<?php echo $popupContent ?>
					</div>
					<div class="col-lg-5 p-4 px-xl-5 bg-beige">
						<div class="h-100 row align-items-center">
							<div class="col-12 modal-content__form "></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




