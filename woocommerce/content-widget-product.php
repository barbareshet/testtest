<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (!is_a($product, 'WC_Product')) {
    return;
}
?>
<li>
    <?php do_action('woocommerce_widget_product_item_start', $args); ?>

    <div class="row mx-0 px-2 product">
        <div class="col-4 pr-0">
            <a href="<?php echo get_permalink($product->get_id()); ?>" target="_blank">
                <?php echo $product->get_image(array()); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </a>
        </div>
        <div class="col-8 d-flex align-items-start flex-column">
            <div class="product-title h5"><?php echo wp_kses_post($product->get_name()); ?></div>
            <?php if (!empty($show_rating)) : ?>
                <?php echo wc_get_rating_html($product->get_average_rating()); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php endif; ?>
            <div class="w-100 mt-auto">
                <div class="product__cta float-right">
                    <a href="<?php echo get_permalink($product->get_id()); ?>" class="btn btn-primary btn-sm"
                       target="_blank"><?php echo __("View All >", "MJK"); ?></a>
                </div>
            </div>
        </div>
    </div>

    <?php do_action('woocommerce_widget_product_item_end', $args); ?>
</li>
