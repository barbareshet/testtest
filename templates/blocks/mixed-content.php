<?php
/**
 * Block Name: Mixed Content
 *
 * Displays an advanced listing with backgrounds.
 *
 * @package MJK
 */

if ( empty($background_color) ) {
    $background_color['background_color'] = 'bg-white';
    $background_color['spacing'] = "needs-spacing-medium";
}

if ( empty($image_position) ) {
    $image_position = 'left';
}

if ( empty($type_of_action) ) {
    $type_of_action = "cta";
}

if ( empty($description) ) {
    $description = "<h2>Fusce sed mattis nulla.</h2>";
    $description .= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ante, rhoncus eget diam et, hendrerit euismod lectus. Aliquam consequat ante erat, eu tempor massa lobortis non.</p>";
}

if ( empty($image) ) {
    $image = [
        "url" => 'https://via.placeholder.com/500x600',
        "width" => 500,
        "height" => 600
    ];
}

if ( empty($mobile_image) ) {
    $mobile_image = [
        "url" => 'https://via.placeholder.com/500x250',
        "width" => 250, 
        "height" => 500
    ];
}

$mobile_image['ratio'] = ((($mobile_image['height'] / $mobile_image['width']) * 100));

?>
<section id="<?php echo $id; ?>" class="block <?php echo $slug; ?>  <?php echo $background_color['background_color'] ?> <?php echo $image_position === 'right' ? sprintf('%s-right', $slug) : '' ?>""">
    <div class="d-flex align-items-center mixed-content__img mixed-content-inner <?php echo ($image_position === 'left') ? 'mixed-content-right' : 'mixed-content-left' ?>">
        <?php if( ! empty($include_video) && $include_video === true ) : ?>
        <div class="play-wrapper">
            <div class="play__link js-play-video"
                data-videotype="<?php echo $video_type ?>"
                data-videoid="<?php echo $video_id ?>"
                data-target=".videos-modal"
                data-toggle="modal">
                <svg class="icon icon-play-filled">
                    <use xlink:href="#icon-play-filled"></use>
                </svg>
            </div>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="mixed-content__text col-md-6 col-lg-5 <?php echo ($image_position === 'left') ? 'offset-lg-7 offset-md-6' : '' ?>"  data-aos="fade">
                    <?php if ( ! empty($description) ) : ?>
                        <?php echo $description ?>
                    <?php endif; ?>
                    <?php if ( $type_of_action === "cta" ) : ?>

                        <?php if( ! empty($buttons['has_primary_button']) ) : ?>
                        <p class="d-flex <?php echo $buttons['placement'] ?>">
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
                                        "class" => "btn btn-secondary"
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
<?php
if ( ! is_admin() ) {
    ob_start();
} else {
    echo "<style>";
}
?> 
#<?php echo $id; ?> .mixed-content__img{
    padding-top:<?php echo $mobile_image['ratio']; ?>%;
    background-image:url('<?php echo $mobile_image['url'] ?>');
}
@media(max-width:768px){
    #<?php echo $id; ?> .play-wrapper {
        margin-top:<?php echo ($mobile_image['ratio'] / 2) + 4 ?>%;
        position: absolute;
        top:0;
        left: 50%;
        transform: translateX(-50%)
    }
}
@media(min-width:768px){
    #<?php echo $id; ?> .mixed-content__img{
        padding-top:0;
        background-image:url('<?php echo $image['url'] ?>');
    }
}
<?php
if ( ! is_admin() ) {
    $GLOBALS['style'] .= ob_get_contents();
    ob_end_clean();
} else {
    echo "</style>";
}