<?php
/**
 * Share Modal template part
 *
 * @package NHA
 */

$social_shares = get_field("social_modal_shares", "option");

if ( empty($social_shares) ) return false;

$permalink = get_permalink();
$title = get_the_title();

$links = [
	"Facebook" => [
		"href" => "javascript: void(0)",
		"onclick" => "window.open('https://www.facebook.com/sharer/sharer.php?u=$permalink', 'share', 'toolbar=0,status=0,width=620,height=400');",
		"target" => "_blank"
	],
	"Twitter" => [
		"href" => "javascript: void(0)",
		"onclick" => "window.open('https://twitter.com/share?text=$title&url=$permalink', 'share', 'toolbar=0,status=0,width=620,height=400');",
		"target" => "_blank"
	],
	"Pinterest" => [
		"href" => "javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());",
		"target" => "_blank"
	],
	"Google+" => [
		"href" => "https://plus.google.com/share?url=$permalink",
		"onclick" => "javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;",
		"target" => "_blank"
	],
	"LinkedIn" => [
		"href" => "https://www.linkedin.com/shareArticle?mini=true&url=$permalink&title=$title&source=".get_bloginfo(),
		"target" => "_blank"
	],
	"Mail" => [
		"href" => "mailto:?subject=".get_bloginfo()."&body=$permalink",
	],
];
?>
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <button type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
        <svg class="icon icon-icon-close">
			<use xlink:href="#icon-icon-close"></use>
		</svg>		
	</button>
    <div class="modal-dialog modal-xl modal-dialog-centered bg-transparent" role="document">
			<div class="modal-content modal-content__share py-4 bg-transparent border-0">
				<div class="container">
					<div class="h2 text-center"><?php echo __("Share", "MJK") ?></div>
					<p class="text-center"><?php echo __("Share this content with others!", "MJK") ?></p>
					<div class="modal__socials socials">
	          <ul>
	              <?php foreach( $social_shares as $social ) : ?>
	              <?php $lc_social = strtolower($social); ?>
	              <li>
	                  <a class="socials__icon socials__icon--<?php echo $lc_social; ?>" 
	                  <?php foreach ( $links[$social] as $attr => $value ) {
	                      echo $attr . '="'. $value .'"';
	                  }
	                  ?>>
	                  <svg <?php echo ($lc_social === "mail") ? 'style="width:25px;height:30px;"' : '' ?> class="icon icon-<?php echo $lc_social; ?>">
	                      <use xlink:href="#icon-<?php echo $lc_social; ?>"></use>
	                  </svg>
	                  </a>
	              </li>
	              <?php endforeach; ?>
	          </ul>
					</div>
				</div>
			</div>
    </div>
</div>