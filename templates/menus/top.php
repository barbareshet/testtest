<?php
/**
 * The Top Site navigation
 *
 * @package MJK
 */

// Check if there's a menu assigned to the 'top' location.
if ( ! has_nav_menu( 'top' ) ) {
    return;
}

wp_nav_menu( [
    'theme_location'  => 'top',
    'menu_class'      => 'navbar-nav ml-auto pb-3 pb-xl-0',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'top-menu',
    'container'       => '',
    'fallback_cb'     => false,
    'depth'           => 1
] );