<?php
/**
 * The template for displaying all single posts.
 *
 * @package MJK
 */

$prev = get_previous_posts_link('Previous Page');
$author = get_the_author();
$categories = get_the_category();
$category_id;
if (!empty($categories[0]->cat_ID)) {
    $category_id = $categories[0]->cat_ID;
}

$category_link;
if (!empty($category_id)) {
    $category_link = get_category_link($category_id);
}

$category_id;
if (!empty($category_id)) {
    $category_name = get_the_category()[0]->name;
}

$categories = get_categories([
    'orderby' => 'name',
    'order' => 'ASC'
]);

get_header();

?>

    <div class="site-content__content">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-8 mb-3">
                    <div class="site-content-wrapper">
                        <div class="site-content__content__blog">

                            <div class="container">

                                <div class="site-content__header row dark-bg">

                                    <div class="col-md-4 d-flex align-items-center">
                                        <a class="h4 mb-3 mb-md-0 text-decoration-none text-uppercase d-inline-flex align-items-center"
                                           href="<?php echo get_permalink(get_page_by_path('blog')); ?>">
                                            <svg class="icon icon-chevron-down mr-1">
                                                <use xlink:href="#icon-chevron-left"></use>
                                            </svg>
                                            <?php echo _e("Back", "MJK") ?>
                                        </a>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-md-end site-content__header__right">
                                        <form class="d-flex" id="postsForm"
                                              action="<?php echo get_permalink(get_page_by_path('blog')); ?>">
                                            <select name="categories" id="category" class="form-control mr-3">
                                                <option value="" selected><?php _e('All', 'mjk') ?></option>
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="<?php _e('Search', 'mjk') ?>"
                                                       name="search"
                                                       id="search"
                                                       title="<?php _e('Search for:', 'mjk') ?>"/>
                                                <div class="input-group-append">
                                                    <input type="submit"
                                                           class="btn btn-search"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <?php while (have_posts()) : ?>

                            <div class="container">
                                <div class="px-2">
                                    <h1 class="h3 text-uppercase"><?php the_title() ?></h1>
                                    <div class="site-content__author">
                                        <?php if (!empty(get_author_name())) : ?>
                                            <p class="text-grey d-inline"><?php echo get_author_name() ?></p>
                                            <span> | </span>
                                        <?php endif; ?>
                                        <p class="text-grey d-inline"><?php echo get_the_date(); ?></p>
                                        <?php if (!empty($category_link)) : ?>
                                            <span> | </span>
                                            <a class="text-grey d-inline" href="<?php echo $category_link ?>"
                                               rel="tag"><?php echo $category_name ?></a>
                                        <?php endif ?>
                                    </div>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="entry__thumb">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php
                            the_post();

                            // Loads the templates/content/singular/page.php template.
                            get_template_part('templates/content/singular/' . get_post_type());
                            get_template_part('templates/components/single-pagination');
                            ?>
                        </div>
                        <?php
                        get_template_part('templates/components/related-posts');

                        //If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || '0' != get_comments_number()) :
                            comments_template();
                        endif;

                        endwhile;

                        ?>

                    </div>

                </div>

                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
the_field("schema");
get_footer('hidden');