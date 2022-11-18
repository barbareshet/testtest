<?php
/**
 * Module: Carousel Banner
 *
 * Displays a carousel banner with background carousel or image.
 *
 * @package MJK
 */

if (empty($carousels)) {
    $carousels = array(
        array()
    );
}

?>
<section id="<?php echo $id ?>" class="carousel">
    <div class="container">
        <div class="carousel__slider js-slick slider-hero" data-aos="fade">
            <?php foreach ($carousels as $i => $carousel) : ?>
                <?php

                if (empty($carousel['background_image'])) {
                    $carousel['image'] = array(
                        "url" => "https://via.placeholder.com/" . round(12 / count($carousels)) . "00x" . round(8 / count($carousels)) . "50",
                        "alt" => __("Sample Image", "MJK")
                    );
                }

                if (empty($carousel['background_color']['background_color'])) {
                    $carousel['background_color']['background_color'] = 'bg-white';
                }

                if (empty($carousel['buttons']['has_primary_button'])) {
                    $carousel['buttons']['has_primary_button'] = false;
                }

                if (empty($carousel['buttons']['has_secondary_button'])) {
                    $carousel['buttons']['has_secondary_button'] = false;
                }

                ?>

                <div class="carousel__slide d-md-flex <?php echo $carousel['background_color']['background_color'] ?> <?php echo $carousel['background_color']['spacing'] ?>">
                    <div class="carousel__media lazy d-none d-md-block"
                         data-bg="url(<?php echo $carousel['background_image']['url'] ?>)"></div>
                    <?php if (!empty($carousel['mobile_background_image'])) : ?>
                        <img class="carousel__media lazy d-md-none img-fluid w-100"
                             alt="<?php echo $carousel['mobile_background_image']['alt'] ?>"
                             data-src="<?php echo $carousel['mobile_background_image']['url'] ?>"/>
                    <?php endif ?>
                    <div class="container d-flex <?php echo $carousel['vertical_alignment'] ?>">
                        <div class="carousel__content container <?php echo $carousel['horizontal_alignment'] ?>">
                            <div class="col-md-12 col-lg-12 d-flex flex-column">
                                <?php echo $carousel['content'];
                                if ($carousel['buttons']['has_primary_button'] === true) : ?>
                                    <p class="d-flex <?php echo $carousel['buttons']['placement'] ?>">
                                        <?php
                                        $primary = new MJK\App\Blocks\Components\Link(
                                            $carousel['buttons']['primary_button'],
                                            array(
                                                "class" => "btn btn-primary"
                                            )
                                        );
                                        $primary->output();

                                        if ($carousel['buttons']['has_secondary_button'] === true) {
                                            $secondary = new MJK\App\Blocks\Components\Link(
                                                $carousel['buttons']['secondary_button'],
                                                array(
                                                    "class" => "btn btn-secondary",
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
            <?php endforeach; ?>
        </div>
    </div>
</section>