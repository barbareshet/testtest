<?php
/**
 * Block Name: 50-50 Spacing
 *
 * @package MJK
 */

if (empty($background_color)) {
    $background_color['background_color'] = 'bg-white';
//    $background_color['spacing'] = "needs-spacing-medium";
}

if (empty($image_position)) {
    $image_position = 'left';
}

if (empty($type_of_action)) {
    $type_of_action = "cta";
}

if (empty($description)) {
    $description = "<h2>Fusce sed mattis nulla.</h2>";
    $description .= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ante, rhoncus eget diam et, hendrerit euismod lectus. Aliquam consequat ante erat, eu tempor massa lobortis non.</p>";
}

if (empty($image)) {
    $image = [
        "url" => 'https://via.placeholder.com/500x600',
        "width" => 500,
        "height" => 600
    ];
}

if (empty($mobile_image)) {
    $mobile_image = [
        "url" => 'https://via.placeholder.com/500x250',
        "width" => 250,
        "height" => 500
    ];
}

?>
<section id="<?php echo $id; ?>"
         class="custom-block <?php echo $slug; ?> fifty-fifty-spacing <?php echo $background_color['background_color'] ?> <?php echo $image_position === 'right' ? sprintf('%s-right', $slug) : '' ?>">
    <div class="fifty-fifty-container container-fluid" data-aos="fade">
        <div class="row <?php echo ($image_position === 'right') ? 'd-flex flex-row-reverse' : '' ?>">
            <div class="col-md-6 d-flex align-items-center p-0">
                <img class="w-100 d-none d-md-block lazy" data-src="<?php echo $image['url'] ?>"
                     alt="<?php echo $image['alt'] ?>">
                <img class="w-100 d-md-none lazy" data-src="<?php echo $mobile_image['url'] ?>"
                     alt="<?php echo $mobile_image['alt'] ?>">
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
            <div class="fifty-fifty-spacing__text d-flex flex-column dark-bg justify-content-center pt-4 pt-md-0 col-md-6">
                <div class="col-md-9 align-self-center d-flex flex-column justify-content-center">
                    <?php echo $description ?>
                    <?php if ($type_of_action === "cta") : ?>
                        <?php if (!empty($buttons['has_primary_button'])) : ?>
                            <p class="d-flex <?php echo $buttons['placement'] ?> fifty-fifty-spacing__buttons">
                                <?php
                                $primary = new MJK\App\Blocks\Components\Link(
                                    $buttons['primary_button'],
                                    array(
                                        "class" => "btn btn-primary"
                                    )
                                );
                                $primary->output();

                                if ($buttons['has_secondary_button']) {
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
                    <?php
                    else:
                        gravity_form($form, false, false, false, '', true, 1);
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>