<?php
/**
 * The Primary Site navigation
 *
 * @package MJK
 */

use MJK\App\Menus\PrimaryMenuWalker;

// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
    return;
}
?>

<?php
wp_nav_menu( [
    'theme_location'  => 'primary',
    'menu_class'      => 'navbar-nav ml-auto d-flex',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'primary-menu',
    'container'       => '',
    'fallback_cb'     => false,
    'depth'           => 2,
    'walker'          => new PrimaryMenuWalker()
] );
?>
