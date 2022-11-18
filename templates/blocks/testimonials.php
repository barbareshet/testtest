<?php
/**
 * Module: Testimonials
 *
 * Displays a carousel of testimonials.
 *
 * @package MJK
 */

if (empty($background_color['background_color'])) {
    $background_color['background_color'] = 'bg-cloth-3';
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if (empty($testimonials)) {
    $testimonials = array(
        array()
    );
}

?>

<section id="<?php echo $id ?>" class="block custom-block testimonial <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?>">
    <div class="slider-testimonials container js-slick" data-aos="fade">

        <?php foreach ($testimonials as $testimonial) : ?>

            <?php

            if (empty($testimonial['quote'])) {
                $testimonial['quote'] = __("Enter your quote...", "MJK");
            }

            if (empty($testimonial['quotee_name'])) {
                $testimonial['quotee_name'] = __("Quotee name...", "MJK");
            }

            if (empty($testimonial['quotee_title'])) {
                $testimonial['quotee_title'] = __("Quotee title...", "MJK");
            }

            ?>

            <div class="slide">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-10 offset-lg-1">
                            <?php if (!empty($testimonial['quote'])) : ?>
                                <blockquote
                                        class="blockquote"><?php echo sanitize_text_field($testimonial['quote']) ?></blockquote>
                            <?php endif; ?>
                            <?php if (!empty($testimonial['quotee_name'])) : ?>
                                <div class="h6 d-inline"> <?php echo sanitize_text_field($testimonial['quotee_name']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($testimonial['quotee_title'])) : ?>
                                <div class="h6 d-inline">
                                    , <?php echo sanitize_text_field($testimonial['quotee_title']); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>

<style><?php if( count($testimonials) === 1 && $background_color['spacing'] === "needs-spacing-medium" ) : ?>
    #
    <?php echo $id; ?>
    {
        padding: 80px 0
    ;
    }
    <?php elseif( count($testimonials) === 1 && $background_color['spacing'] === "needs-spacing-large" ) : ?>
    #
    <?php echo $id; ?>
    {
        padding: 120px 0
    ;
    }<?php endif; ?></style>