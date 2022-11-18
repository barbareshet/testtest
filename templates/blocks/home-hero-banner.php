<?php
/**
 * Module: Home Hero Banner
 *
 * @package MJK
 */

$headline = get_field('headline');
$subheadline = get_field('subheadline');
$background_image = get_field('background_image');
$buttons = get_field('buttons');

$quote = get_field('quote');
$quotee_name = get_field('quotee_name');

$video_id = get_field('video_id');
$video_type = get_field('video_type');
$image = get_field('image');
$does_this_block_have_quotes = get_field('does_this_block_have_quotes');
$quotes = get_field('quotes');

?>

<div class="hero lazy d-flex align-items-center" data-bg="url('<?php echo $background_image['url'] ?>')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 offset-md-2 col-lg-5 offset-lg-0 order-2 order-lg-1 transparency-container">
                <h1 class="text-left h2 mb-1 hero__headline"><?php echo $headline ?></h1>
                <p class="text-left mb-0 pt-3 hero__subcopy"><?php echo $subheadline ?></p>
                <?php if( ! empty($buttons['has_primary_button']) ) : ?>
                <p class="my-4 d-flex justify-content-center">
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
                                "class" => "btn btn-primary",
                            )
                        );
                        $secondary->output();
                    }
                ?>
                </p>
                <?php endif ?>

                <div class="slider-hero-quotes container js-slick">

                <?php foreach( $quotes as $quote ) : ?>

                    <?php 
                        if ( empty($quote['quote']) ) {
                            $quote['quote'] = __("Enter your quote...", "MJK");
                        }

                        if ( empty($quote['quotee_name']) ) {
                            $quote['quotee_name'] = __("Quotee name...", "MJK");
                        }
                    ?>

                    <?php if( $does_this_block_have_quotes === true ) : ?>
                    <div class="slide">
                        <div class="text-center">
                            <?php if ( ! empty($quote['quote']) ) : ?>
                            <p class="hero__quote px-5 px-sm-5 px-lg-2 px-xl-5 mb-2"><?php echo sanitize_text_field($quote['quote']) ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty($quote['quotee_name']) ) : ?>
                            <p class="hero__quotee text-uppercase"><?php echo sanitize_text_field($quote['quotee_name']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif ?>

                <?php endforeach; ?>
                </div>

            </div>
            <div class="col-md-8 offset-md-2 col-lg-7 offset-lg-0 order-1 order-lg-2 d-flex align-items-center pl-5">
                <?php if ( ! empty($image) ) : ?>
                <div class="<?php echo (!empty($video_id)) ? ' hero__video js-play-video ':null ?> w-100 mb-4 mb-lg-0" 
                        <?php if(!empty($video_id)) : ?>
                            data-videotype="<?php echo $video_type ?>"
                            data-videoid="<?php echo $video_id ?>"
                            data-target=".videos-modal"
                            data-toggle="modal"
                        <?php endif; ?>
                     >
                    <img class="w-100 lazy" data-src="<?php echo ! empty($image) ? $image['url'] : 'https://via.placeholder.com/500x600'; ?>" alt="<?php echo $image['alt'] ?>">
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
