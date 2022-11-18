<?php
/**
 * Check for flexible content rows and include module file if exists
 *
 * @package MJK
 */

if ( ! function_exists( 'have_rows' ) || ! have_rows( 'modules' ) ) {
    return false;
}

while ( have_rows( 'modules' ) ) {
    the_row();
    $module_name = get_row_layout();
    $module_index = get_row_index();
    $class_name = str_replace( '_', '-', $module_name );

    echo '<section id="module-' . $module_index . '" class="' . $class_name . ' module">';
    include( locate_template( "templates/modules/{$module_name}.php" ) );
    echo '</section>';
}