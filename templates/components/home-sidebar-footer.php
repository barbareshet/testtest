<?php
/**
 * The template for displaying the footer.
 *
 * @package MJK
 */

$options = get_fields('option');
?>

<section class="footer footer--sidebar dark-bg">
	<div class="footer__content">
		<?php get_template_part( 'templates/menus/footer' ); ?>

		<div class="footer__company-details footer__company-details--sidebar">
            <ul class="list-unstyled">
				<li class="list-item">
					<?php echo $options['address']; ?>
				</li>
				<li class="list-item">
					<a href="mailto: <?php echo $options['email'] ?>"><?php echo $options['email'] ?></a>
				</li>
			</ul>
		</div>
		
		<div class="footer__copyright footer__copyright--sidebar">
			<ul class="list-unstyled">
				<li class="list-item">
					Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
				</li>
				<li class="list-inline-item">
					<a class="mr-2" href="<?php echo get_permalink( get_page_by_path( 'terms-conditions' ) ); ?>"><?php echo _e('Terms & Conditions') ?></a> |
				</li>
				<li class="list-inline-item">
					<a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) ); ?>"><?php echo _e('Privacy Policy') ?></a>
				</li>
				<li class="list-item">
					<a href="https://mjkretsinger.com/" target="_blank"> <?php echo _e('Designed by MJ Kretsinger') ?></a>
				</li>
			</ul>
		</div>
		<div class="footer__social-icons footer__social-icons--sidebar socials">
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
</section>
