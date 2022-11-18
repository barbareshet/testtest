<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MJK
 */

get_header(); ?>
    <div class="site-content__content">
        <div id="primary">
            <?php
            // Load Modules
            get_template_part( 'templates/components/' . get_post_type() . '_modules' );

            echo '<div class="container">';
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();

                    // Loads the templates/content/singular/page.php template.
                    get_template_part( 'templates/content/archive/' . get_post_type() );
                }
            } else {
                // Loads the templates/content/singular/page.php template.
                get_template_part( 'templates/content/content', 'none' );
            }
            echo '</div>';
            ?>
        </div><!-- /#primary -->

    </div>

<?php get_footer();
