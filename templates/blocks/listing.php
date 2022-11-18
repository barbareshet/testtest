<?php
/**
 * Module: Listing
 *
 * Displays a two column listing.
 *
 * @package MJK
 */

if (empty($image)) {
    $image = array(
        "url" => "https://via.placeholder.com/400",
        "alt" => __("Sample Image", "MJK")
    );
}

if (empty($background_color['background_color'])) {
    $background_color['background_color'] = 'bg-light';
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if (empty($listing_content)) {
    $listing_content = __("Enter your content...", "MJK");
}

if (empty($image_align)) {
    $image_align = 'Right';
}

?>

<section id="<?php echo $id ?>"
         class="listing block <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?> custom-block ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="listing__border">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center <?php echo ($image_align === 'right') ? 'order-md-last' : ''; ?>"
                             data-aos="fade">
                            <?php if (!empty($has_more_link) && $include_video === false) : ?>
                            <a href="<?php echo (!empty($more_link['internal_link'])) ? $more_link['internal_link'] : $more_link['external_link']; ?>">
                                <?php endif; ?>
                                <?php if ($include_video) : ?>
                                    <div class="play__link play__link--small js-play-video"
                                         data-videotype="<?php echo $video_type ?>"
                                         data-videoid="<?php echo $video_id ?>"
                                         data-target=".videos-modal"
                                         data-toggle="modal">
                                        <svg class="icon icon-play-filled">
                                            <use xlink:href="#icon-play-filled"></use>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($image)) : ?>
                                    <img class="listing__img w-100 lazy" data-src="<?php echo $image['url'] ?>"
                                         alt="<?php echo $image['alt'] ?>">
                                <?php endif ?>
                                <?php if (!empty($has_more_link) && $include_video === false) : ?>
                            </a>
                        <?php endif; ?>
                            <!-- end has_more_link -->
                        </div>
                        <!-- end image -->

                        <div class="listing__content <?php echo (!empty($image)) ? 'col-md-8' : 'col-12' ?> <?php echo ($image_align === 'right') ? 'order-md-first' : ''; ?> align-self-center"
                             data-aos="fade">
                            <?php if (!empty($listing_content)) : ?>
                                <?php echo $listing_content ?>
                                <?php if (!empty($has_more_link)) : ?>
                                    <?php
                                    $primary = new MJK\App\Blocks\Components\Link(
                                        $more_link,
                                        array(
                                            "class" => ""
                                        )
                                    );
                                    $primary->output();
                                    ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>