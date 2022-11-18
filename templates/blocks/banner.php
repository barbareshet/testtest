<?php
/**
 * Module: Banner
 *
 * Displays a banner block.
 *
 * @package MJK
 */

//if( empty($background_color["background_color"]) ) {
//    $background_color["background_color"] = 'bg-white';
//}

if (empty($banner_background_color)) {
    $banner_background_color = 'bg-white';
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if (empty($text_location)) {
    $text_location = 'Right';
}

?>

<section id="<?php echo $id; ?>" class="banner block <?php echo $slug; ?> <?php echo $background_color['spacing'] ?>  <?php echo $background_color['background_color'] ?>  custom-block">
    <div class="container">
        <div class="row">
            <div class="col-md-7 <?php echo ($text_location === 'right') ? 'order-md-1 pr-md-0' : 'order-md-2 pl-md-0' ?>"
                 data-aos="fade">
                <div class="w-100 d-md-flex align-items-center lazy banner__img"
                     data-bg="url(<?php echo !empty($image) ? $image['url'] : 'https://via.placeholder.com/500x600'; ?>)">
                    <?php if (!empty($include_video) && $include_video === true) : ?>
                        <div class="play__link js-play-video"
                             data-videotype="<?php echo $video_type ?>"
                             data-videoid="<?php echo $video_id ?>"
                             data-target=".videos-modal"
                             data-toggle="modal">
                            <svg class="icon icon-play-filled">
                                <use xlink:href="#icon-play-filled"></use>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-5 <?php echo ($text_location === 'right') ? 'order-md-2 pl-md-0' : 'order-md-1 pr-md-0' ?> d-md-flex align-items-stretch justify-content-center"
                 data-aos="fade">
                <div class="<?php echo $banner_background_color ?> w-100 d-md-flex align-items-center py-3 pt-md-0 pr-md-0 banner-right-block">
                    <div class="w-100">
                        <div class="offset-md-1 col-md-10 text-center">
                            <?php if (!empty($content)) : ?>
                                <?php echo $content ?>
                            <?php endif ?>
                            <?php if (!empty($buttons['has_primary_button'])) : ?>
                                <p class="d-flex <?php echo $buttons['placement'] ?>">
                                    <?php
                                    $primary = new MJK\App\Blocks\Components\Link(
                                        $buttons['primary_button'],
                                        array(
                                            "class" => "btn btn-primary btn-lg"
                                        )
                                    );
                                    $primary->output();

                                    if ($buttons['has_secondary_button']) {
                                        $secondary = new MJK\App\Blocks\Components\Link(
                                            $buttons['secondary_button'],
                                            array(
                                                "class" => "btn btn-secondary btn-lg",
                                            )
                                        );
                                        $secondary->output();
                                    }
                                    ?>
                                </p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>