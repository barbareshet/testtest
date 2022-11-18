<?php
$product = wc_get_products([
    'post_type' => 'product',
    'meta_query' => [
        [
        	'key' => '_featured', //meta key name here
            'value' => 'yes', 
            'compare' => '=',
        ]
    ],  
    'limit' => 1
]);

if ( empty($product) ) return false;

$product = $product[0];

$trailer_image = get_field('trailer_image', $product->get_id());

$video_id = get_post_meta($product->get_id(), '_trailer', true);

?>

<!--<ul class="product_list_widget featured-product-list">-->
<!--	<li class="product">-->
<!--		<div class="px-2">-->
<!--			<div class="container">-->
<!--				<p class="mb-2">-->
<!--					<a href="--><?php //echo esc_url( $product->product_url ); ?><!--" target="_blank">-->
<!--						<img class="lazy" data-src="--><?php //echo $trailer_image['url'] ?><!--" alt="--><?php //echo $trailer_image['alt'] ?><!--" />-->
<!--					</a>-->
<!--				</p>-->
<!--				<p class="mb-2">-->
<!--					<a class="product-title h5" href="--><?php //echo esc_url( $product->product_url ); ?><!--">--><?php //echo wp_kses_post( $product->get_name() ); ?><!--</a>-->
<!--				</p>-->
<!--				--><?php //if ( ! empty( $show_rating ) ) : ?>
<!--					--><?php //echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<!--				--><?php //endif; ?>
<!--				<div clazss="d-flex mt-auto align-items-end">-->
<!--					<span class="ml-auto">-->
<!--						<button class="btn btn-primary btn-sm js-play-video" data-videoid="--><?php //echo $video_id ?><!--" data-target=".videos-modal" data-toggle="modal">--><?php //echo __("Trailer", "MJK"); ?><!--</button>-->
<!--						<a href="--><?php //echo esc_url( $product->product_url ); ?><!--" class="btn btn-primary btn-sm" target="_blank">--><?php //echo __("Buy Now", "MJK"); ?><!--</a>-->
<!--					</span>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->
<!--</ul>-->