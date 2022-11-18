<?php
/**
 * Module: Image
 *
 * Displays a block an image or images in a carousel.
 *
 * @package MJK
 */

if( empty($images) ) {
    $images = array(
        array(
            "image" => ['url' => "https://via.placeholder.com/720x864"],
            "include_video" => 'false'
        )
    );
}

if(empty($container_required)) {
    $container_required = false;
}
?>

<section id="<?php echo $id ?>" class="image block custom-block <?php echo $background_color['background_color'] ?>" data-aos="fade">

    <?php if ( $container_required === TRUE ) : ?>
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
    <?php endif; ?>

        <div class="image__slider js-slick slider-images">
            <?php foreach( $images as $i => $slide ) : ?>

            <div class="slide">
                <img class="w-100 lazy <?php echo ( $slide['include_mobile_image'] === TRUE ) ? 'd-none d-md-inline' : '' ?>" data-src="<?php echo $slide['image']['url']?>)">
                <?php if( ! empty($slide['include_mobile_image']) ) : ?>
                <img class="w-100 lazy d-md-none" alt="<?php echo $slide['mobile_image']['alt'] ?>" data-src="<?php echo $slide['mobile_image']['url'] ?>" />
                <?php endif ?>

                <?php if( $slide['include_video'] ) : ?>
                <div class="play__link play__link--image js-play-video"
                    data-videotype="<?php echo $slide['video_type'] ?>"
                    data-videoid="<?php echo $slide['video_id'] ?>"
                    data-target=".videos-modal"
                    data-toggle="modal">
                    <svg class="icon icon-play-filled">
                        <use xlink:href="#icon-play-filled"></use>
                    </svg>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if( ! empty($buttons['has_primary_button']) ) : ?>
        <p class="mt-5 d-flex <?php echo $buttons['placement'] ?>">
        <?php 
            $primary = new MJK\App\Blocks\Components\Link(
                $buttons['primary_button'],
                array(
                    "class" => "btn btn-primary"
                )
            );
            $primary->output();            

            if($buttons['has_secondary_button']) {
                $secondary = new MJK\App\Blocks\Components\Link(
                    $buttons['secondary_button'],
                    array(
                        "class" => "btn btn-secondary",
                    )
                );
                $secondary->output();
            }
        ?>
        </p>
        <?php endif ?>

    <?php if ( $container_required === TRUE ) : ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( ! empty($buttons['has_primary_button']) && $container_required === TRUE ) : ?>
    <style>#<?php echo $id ?> {padding:80px 0;}</style>
    <?php endif ?>
</section>