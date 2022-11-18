<?php
$categories = get_categories([
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true
]);

$types = get_terms([
    'taxonomy' => 'content_types',
    'hide_empty' => true,
]);

$blog_category = get_category(get_query_var('cat'), false);
?>
<div class="site-content__content__blog">
    <div class="top-box dark-bg pt-4 pb-4">
        <div class="container">
            <form id="postsForm">
                <div class="row mb-3 mb-lg-4">
                    <div class="col-lg-9">
                        <?php if (is_front_page() === true) : ?>
                            <h2 class="h3 mb-4 mb-lg-0 text-uppercase"><?php _e('Relationship Resource Center', 'mjk') ?></h2>
                        <?php elseif (is_home() === true || is_category()) : ?>
                            <h1 class="h3 mb-4 mb-lg-0 text-uppercase"><?php _e('Thinker Updates - Articles, Videos and more.', 'mjk') ?></h1>
                        <?php elseif (is_tag() === true) : ?>
                            <?php $tag = get_queried_object(); ?>
                            <h1 class="h3 mb-4 mb-lg-0 text-uppercase"><?php echo $tag->name ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="search" class="form-control"
                                   placeholder="<?php _e('Search Blog', 'mjk') ?>"
                                   name="search"
                                   id="search"
                                   title="<?php _e('Search for:', 'mjk') ?>"/>
                            <div class="input-group-append">
                                <input type="submit"
                                       class="btn btn-search"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-xl-4 d-flex align-items-center">
                        <select name="categories" id="category" class="form-control">
                            <option value="all" selected><?php echo __('Category', 'mjk') ?></option>
                            <?php foreach ($categories as $category) : ?>
                                <option <?php echo ((isset($_GET['categories']) && $category->term_id == $_GET['categories']) || (!empty($blog_category) && $category->term_id == $blog_category->term_id)) ? ' selected ' : null ?>
                                        value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-8 col-xl-8 d-flex flex-wrap justify-content-end mt-3 mt-lg-0">
                        <?php foreach ($types as $type) : ?>
                            <div class="btn btn-checkbox p-0 mb-2">
                                <label>
                                    <input name="types-<?php echo $type->term_id ?>" type="checkbox"
                                           value="<?php echo $type->term_id ?>">
                                    <span><?php echo $type->name ?></span>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="posts-container">
        <div class="first-post" id="first-post"></div>
        <div id="posts" class="d-inline-block"></div>
        <div class="blog-loader">
            <span class="loader"><?php echo __("Loading...", "MJK") ?></span>
        </div>
    </div>
</div>

