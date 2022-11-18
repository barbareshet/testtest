<?php
/**
 * The template for displaying the footer.
 *
 * @package MJK
 */

$options = get_fields('option');
?>

</main>

<footer class="footer dark-bg">
	<div class="footer__content">
		<?php get_template_part( 'templates/menus/footer' ); ?>
		<div class="footer__company-details">
			<ul class="list-unstyled list-inline">
				<li class="list-inline-item pr-2">
					<?php echo $options['address']; ?>
				</li>
				<li class="list-inline-item pr-2">
					<a href="mailto: <?php echo $options['email'] ?>"><?php echo $options['email'] ?></a>
				</li>
			</ul>
		</div>
		<div class="footer__copyright">
			<ul class="list-unstyled list-inline">
				<li class="list-inline-item pr-2">
					&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
				</li>
				<li class="list-inline-item pr-2">
					<a href="<?php echo get_permalink( get_page_by_path( 'terms-and-conditions' ) ); ?>"><?php echo _e('Terms & Conditions') ?></a>
				</li>
				<li class="list-inline-item pr-2">
					<a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) ); ?>"><?php echo _e('Privacy Policy') ?></a>
				</li>
				<li class="list-inline-item pr-2">
					<a href="https://mjkretsinger.com/" target="_blank"> <?php echo _e('Designed by MJ Kretsinger') ?></a>
				</li>
			</ul>
		</div>
		<div class="footer__social-icons socials">
			<ul>
			<?php $socials = [ 'facebook', 'twitter', 'pinterest', 'youtube', 'google_plus', 'instagram', 'linkedin' ]; ?>
			<?php $index = 1; ?>
			<?php foreach( $socials as $social ) : ?>
				<?php if( ! empty($options[ $social .'_url' ]) ) : ?>
					<li>
						<a class="socials__icon socials__icon--<?php echo $social; ?>" href="<?php echo esc_url( $options[ $social .'_url' ] ); ?>" target="_blank">
							<svg class="icon icon-<?php echo $social; ?>"><use xlink:href="#icon-<?php echo $social; ?>"></use></svg>
						</a>
					</li>
					<?php $index++; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			</ul>
		</div>
	</div><!-- .footer__content -->
</footer>

<?php get_template_part( 'templates/components/share-modal' ); ?>
<?php get_template_part( 'templates/components/form-modal' ); ?>
<?php get_template_part( 'templates/components/video-modal' ); ?>
<?php get_template_part( 'templates/components/social-share' ); ?>
<?php get_template_part( 'templates/components/image-modal' ); ?>
<?php get_template_part( 'templates/components/popup-modal' ); ?>
<style><?php echo $GLOBALS['style']; ?></style>
<?php wp_footer(); ?>
</body>
</html>
