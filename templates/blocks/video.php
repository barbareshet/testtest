<?php
/**
 * Module: Listing
 *
 * Displays a two column listing.
 *
 * @package MJK
 */

if ( empty($video_id) ) {
    $video_id = 'Y7dpJ0oseIA';
}

if ( empty($video_type) ) {
    $video_type = 'YouTube';
}

if ( empty($needs_container['needs_container']) ) {
    $needs_container['needs_container'] = true;
}

if ( empty($background_color['background_color']) ) {
    $background_color['background_color'] = 'bg-white';
}

if( empty($background_color['spacing']) ) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if ( $video_type === "YouTube" ) {
    $video_embed = "https://www.youtube.com/embed/".$video_id;
} else {
    $video_embed = "https://player.vimeo.com/video/".$video_id;
}


?>

<section id="<?php echo $id ?>" class="video block custom-block <?php echo $background_color['background_color'] ?> <?php echo $background_color['spacing'] ?>">

    <?php if ( $needs_container['needs_container'] === true ) : ?>
    <div class="container">
    <?php endif; ?>

        <div class="card border-0" data-aos="fade">
            <?php if ( ! empty($video_id) && empty($image['url']) ) : ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php echo $video_embed ?>" allowfullscreen></iframe>
            </div>
            <?php endif ?>
            <?php if ( ! empty($image['url']) ) : ?>
            <div class="card-top d-flex justify-content-center align-items-center">
                <img class="card-img-top w-100 lazy" data-src="<?php echo $image['url'] ?>" alt="">
                <div class="play__link js-play-video"
                    data-videotype="<?php echo $video_type ?>"
                    data-videoid="<?php echo $video_id ?>"
                    data-target=".videos-modal"
                    data-toggle="modal">
                    <svg class="icon icon-play">
                        <use xlink:href="#icon-play"></use>
                    </svg>
                </div>
            </div>
            <?php endif ?>
            <?php if( ! empty($content) ) : ?>
            <div class="card-body">
                <?php echo $content; ?>
            </div>
            <?php endif ?>
        </div>

    <?php if ( $needs_container['needs_container'] === true ) : ?>
    </div>
    <?php endif; ?>
</section>