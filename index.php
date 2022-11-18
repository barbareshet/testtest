<?php
/**
 * The template for displaying all single posts.
 *
 * @package MJK
 */

get_header();

// get_template_part( 'templates/components/utility-bar' );
?>

<div class="site-content__content">
    <div class="container">
        <div id="primary" class="row py-5">
            <div class="col-lg-8">
                <?php
                get_template_part( 'templates/blog/top' );
                get_template_part( 'templates/blog/js_templates/firstPost' );
                get_template_part( 'templates/blog/js_templates/listing' );
                get_template_part( 'templates/blog/js_templates/noResults' );
                get_template_part( 'templates/blog/js_templates/error' );
                ?>
            </div>
            <?php get_sidebar(); ?>            
        </div><!-- /#primary -->
    </div>
</div>

<?php get_footer('hidden');
