<?php
/**
 * The Footer
 *
 * @package MJK
 */

use MJK\App\Menus\NavFooterWalker;


// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'footer' ) ) {
    return;
}
?>

<nav class="footer__menu">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container'       => '',
    		'walker'          => new NavFooterWalker()
        )
    );
?>
</nav><!-- .navigation -->
