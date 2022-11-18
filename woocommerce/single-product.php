<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
    <div class="site-content__content">
        <div class="container">
            <div class="container">

                <div class="site-content__header row">
                    <div class="col-md-12 d-flex align-items-center">
                        <a class="h4 mb-12 mb-md-0 text-decoration-none text-uppercase d-inline-flex align-items-center"
                           href="<?php echo get_permalink(get_page_by_path('shop')); ?>">
                            <svg class="icon icon-chevron-down mr-1">
                                <use xlink:href="#icon-chevron-left"></use>
                            </svg>
                            <?php echo _e("Back", "MJK") ?>
                        </a>
                    </div>
                </div>

            </div>
            <div id="primary" class="row py-5">

                    <?php
                    /**
                     * woocommerce_before_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    ?>

                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>

                        <?php wc_get_template_part('content', 'single-product'); ?>

                    <?php endwhile; // end of the loop. ?>

                    <?php
                    /**
                     * woocommerce_after_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    ?>

            </div>
        </div>
    </div>
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
