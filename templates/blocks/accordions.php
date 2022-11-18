<?php
/**
 * Module: Listing
 *
 * Displays a two column listing.
 *
 * @package MJK
 */

$accordion_plus = MJK_THEME_PATH_URL . 'assets/images/Accordian_Plus.svg';
$accordion_minus = MJK_THEME_PATH_URL . 'assets/images/Accordian_Minus.svg';

if (empty($spacing)) {
    $spacing = "needs-spacing-medium";
}
?>

<section id="<?php echo $id ?>"
         class="accordions block custom-block <?php echo $spacing ?> <?php echo $background_color['background_color'] ?>">
    <div class="container" data-aos="fade">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div id="accordion<?php echo $module_index ?>">

                    <?php foreach ($accordions as $i => $accordion) : ?>

                        <?php
                        $headline = $accordion['headline'];
                        $text = $accordion['text'];
                        ?>

                        <div class="card border-0">
                            <div class="d-flex justify-content-between align-items-center card-header bg-white border-0 px-0"
                                 id="heading-<?php echo $i ?>" data-toggle="collapse" data-target="#<?php echo $i ?>"
                                 aria-expanded="false" aria-controls="<?php echo $i ?>">
                                <h5 class="mb-0 text-primary">
                                    <?php echo sanitize_text_field($headline) ?>
                                </h5>
                                <img class="accordion-plus float-right" src="<?php echo $accordion_plus ?>" alt=""
                                     aria-hidden="true">
                                <img class="accordion-minus float-right" src="<?php echo $accordion_minus ?>" alt=""
                                     aria-hidden="true">
                            </div>

                            <div id="<?php echo $i ?>" class="collapse" aria-labelledby="heading-<?php echo $i ?>"
                                 data-parent="#accordion">
                                <div class="card-body p-0 pt-4">
                                    <p class="mb-0 text-gray">
                                        <?php echo sanitize_text_field($text) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>