<?php
/**
 * Module: Listing
 *
 * Displays a two column listing.
 *
 * @package MJK
 */

$arrow_down = MJK_THEME_PATH_URL . 'assets/images/Chevron_Down_White.svg';
$arrow_up = MJK_THEME_PATH_URL . 'assets/images/Chevron_Up_White.svg';

if (empty($tabs)) {
    $tabs = array(
        array()
    );
}

if (empty($background_color['background_color'])) {
    $background_color['background_color'] = 'bg-dark';
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}

?>

<section id="<?php echo $id ?>" class="tabs block custom-block <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?>">
    <div class="container">
        <?php if (!empty($content)) : ?>
            <div class="row" data-aos="fade">
                <div class="col-md-8 offset-md-2 mb-5">
                    <?php echo $content ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" data-aos="fade">
            <div class="offset-md-1 col-md-10">
                <ul class="nav nav-tabs d-none d-md-flex" id="myTab" role="tablist">
                    <?php
                    $tab_count = 0;
                    foreach ($tabs as $i => $tab) : ?>
                        <?php

                        if (empty($tab['tab_title'])) {
                            $tab['tab_title'] = __("Enter your title...", "MJK");
                        }

                        if (empty($tab['tab_content'])) {
                            $tab['tab_content'] = __("Enter your content...", "MJK");
                        }

                        $name_no_spaces = str_replace(' ', '', $tab['tab_title']);

                        ?>
                        <li class="nav-item">
                            <a class="h6 nav-link nav-link--tabs <?php var_dump($tab_count); ?> <?php echo ($tab_count === 0) ? 'active show ' : '' ?>"
                               id="<?php echo $name_no_spaces ?>-tab"
                               data-toggle="tab"
                               href="#<?php echo $name_no_spaces ?>"
                               role="tab">
                                <?php echo sanitize_text_field($tab['tab_title']) ?>
                            </a>
                        </li>
                        <?php
                        $tab_count++;
                    endforeach ?>
                </ul>
                <div class="tab-content nav nav-tabs">
                    <?php
                    $tab_pane_count = 0;
                    foreach ($tabs as $i => $tab) :

                        if (empty($tab['tab_title'])) {
                            $tab['tab_title'] = __("Enter your title...", "MJK");
                        }

                        $name_no_spaces = str_replace(' ', '', $tab['tab_title']);

                        if (empty($tab['tab_content'])) {
                            $tab['tab_content'] = __("Enter your content...", "MJK");
                        }

                        ?>

                        <a href="#<?php echo $name_no_spaces; ?>"
                           data-toggle="tab"
                           id="<?php echo $name_no_spaces ?>-tab-ac"
                           class="w-100 nav-link tab__accordion d-md-none h4"
                           role="tab">
                            <svg class="icon icon-plus">
                                <use xlink:href="#icon-plus"></use>
                            </svg>
                            <svg class="icon icon-minus">
                                <use xlink:href="#icon-minus"></use>
                            </svg>
                            <?php echo $tab['tab_title']; ?>
                        </a>

                        <div class="tab-pane <?php echo ($tab_pane_count === 0) ? 'active show ' : '' ?>"
                             id="<?php echo $name_no_spaces ?>" role="tabpanel"
                             aria-labelledby="<?php echo $name_no_spaces ?>-tab">
                            <?php echo $tab['tab_content'] ?>
                        </div>
                        <?php
                        $tab_pane_count++;
                    endforeach ?>
                </div>
            </div>
        </div>
        <?php if (!empty($buttons['has_primary_button'])) : ?>
            <div class="d-flex <?php echo $buttons['placement'] ?>">
                <p class="mt-4">
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
            </div>
        <?php endif ?>
    </div>
</section>