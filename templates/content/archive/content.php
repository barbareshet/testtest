<?php
/**
 * @package MJK
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$featured_img_alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

$excerpt_length = strlen( get_the_excerpt() );

?>

<article class="row result">
    <div class="<?php echo ($featured_img_url) ? 'col-lg-4 col-sm-5' : 'd-none' ?>">
        <a href="<?php echo the_permalink() ?>">
            <img data-src="<?php echo $featured_img_url ?>" alt="<?php echo $featured_img_alt; ?>" class="img-fluid lazy">
        </a>
    </div>
    <div class="<?php echo ($featured_img_url) ? 'col-lg-8 col-sm-7' : 'col-md-12' ?> ">
        <?php the_title( sprintf( '<h3 class="mb-3 text-dark mt-3 mt-md-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        <p><?php echo the_excerpt() ?></p>
        <?php if( $excerpt_length !== 0 ) : ?>
        <p>
            <a href="<?php echo the_permalink() ?>"><?php echo __("Learn More", "MJK") ?></a>
        </p>
        <?php endif ?>
    </div>
</article><!-- #post-## -->
