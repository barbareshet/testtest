<?php
/**
 * The template for displaying search results.
 *
 * @package MJK
 */

get_header();

$s = get_search_query();
$args = array(
    's' => $s
);
// The Query
$search_query = new WP_Query($args);

?>

    <div class="site-content__content">
        <div class="container">
            <div id="primary" class="row mt-5">
                <div class="col-md-8 mb-3">
                    <div class="site-content__content__blog site-content__content__search">
                        <div class="result-head-container dark-bg">
                            <div class="container">
                                <?php if ($search_query->have_posts()) : ?>
                                    <div class="h1 mb-0"><?php echo __("Results", "MJK"); ?>
                                        (<?php echo $search_query->found_posts ?>)
                                    </div>
                                <?php else : ?>
                                    <div class="h1 mb-0"><?php echo __("No Results", "MJK"); ?></div>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="container">
                            <div class="px-2">

                                <?php if ($search_query->have_posts()) : ?>

                                    <?php while ($search_query->have_posts()) : $search_query->the_post(); ?>

                                        <?php get_template_part('templates/content/archive/content'); ?>
                                        <?php if (($search_query->current_post + 1) != ($search_query->post_count)) : ?>
                                            <hr class="hr-negative-margin my-4">
                                        <?php endif ?>

                                    <?php endwhile; ?>

                                <?php else : ?>

                                    <?php get_template_part('templates/content/content', 'none'); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>

            </div><!-- /#primary -->
        </div>
    </div>

<?php get_footer();
