<?php
/**
 * Part: Related Posts
 *
 * @package NHA
 */

$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
$category_ids = array();
foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

$args = array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page' => 3, // Number of related posts that will be shown.
    'caller_get_posts' => 1
);

// the query
$related_posts_query = new WP_Query($args);

?>
    <div class="site-content__content__blog">
        <div class="related-posts mb-3">
            <div class="related-posts-head dark-bg">
                <div class="container">
                    <h3 class="text-uppercase"><?php echo _e('Related Posts') ?></h3>
                </div>
            </div>
            <div class="related-posts-container">
                <?php while ($related_posts_query->have_posts()) :
                $related_posts_query->the_post(); ?>
                <!-- if not last post -->
                <?php if (($related_posts_query->current_post + 1) != ($related_posts_query->post_count)) : ?>
                <article class="row result">
                    <?php else : ?>
                    <article class="row result">
                        <?php endif ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="col-md-7 col-lg-6 col-xl-5">
                                <a href="<?php the_permalink() ?>">
                                    <img src="<?php the_post_thumbnail_url('medium') ?>" alt="featured image"
                                         class="img-fluid">
                                </a>
                            </div>
                        <?php endif ?>
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="col-md-5 col-lg-6 col-xl-7">
                            <?php else : ?>
                            <div class="col-md-12">
                                <?php endif ?>
                                <a class="h4" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?> </a>
                                <?php if (!empty(get_the_date())) : ?>
                                    <div class="result__date mb-0 mb-md-1 mb-xl-2">
                                        <p class="d-inline"><?php echo get_the_date(); ?></p> |
                                    </div>
                                <?php endif ?>
                                <?php the_excerpt(); ?>
                                ...<a class="result__more" href="<?php the_permalink() ?>">More</a>
                            </div>

                    </article>

                    <?php if (($related_posts_query->current_post + 1) != ($related_posts_query->post_count)) : ?>
                        <!--                    <hr class="my-4 hr-negative-margin">-->
                    <?php endif ?>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </article>
            </div>
        </div>
    </div>
<?php
$post = $orig_post;
wp_reset_query(); ?>