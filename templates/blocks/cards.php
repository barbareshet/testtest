<?php
/**
 * Module: Cards
 *
 * Displays a row of cards.
 *
 * @package MJK
 */

if (empty($cards)) {
    $cards = array(
        array(),
        array()
    );
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if (empty($background_color['background_color'])) {
    $background_color['background_color'] = 'bg-dark';
}

$card_column_number;
$card_amount = count($cards);

if ($card_amount <= 4) {
    $card_column_number = 12 / $card_amount;
} else if ($card_amount > 4) {
    $card_column_number = 3;
}

?>

<section id="<?php echo $id; ?>" class="block custom-block <?php echo $background_color['spacing'] ?> cards <?php echo $slug; ?> <?php echo $background_color['background_color'] ?>">
    <div class="container">
        <div class="row" data-aos="fade">
            <div class="col-md-8 offset-md-2 mb-5">
                <?php echo $content ?>
            </div>
        </div>
        <div class="row">
            <?php foreach ($cards as $card) :
                if (!empty($include_links_in_cards)) {
                    $card['link'] = new MJK\App\Blocks\Components\Link($card['link'], array(
                        "class" => "link",
                        "before" => "<h4>",
                        "after" => "</h4>"
                    ));
                }

                if (!empty($include_images_in_cards)) {

                    if (empty($card['image'])) {
                        $card['image'] = array(
                            "url" => "https://via.placeholder.com/" . round(12 / count($cards)) . "00x" . round(8 / count($cards)) . "50",
                            "alt" => __("Sample Image", "MJK")
                        );
                    } else {
                        $card['image']['url'] = wp_get_attachment_image_src($card['image']['ID'], 'medium_large', false)[0];
                    }
                }

                ?>
                <div class="col-md-6 col-lg-<?php echo $card_column_number ?>  mb-4 <?php echo (count($cards) <= 4) ? 'mb-lg-0' : '' ?> "
                     data-aos="fade">
                    <div class="row">
                        <?php if (!empty($include_images_in_cards)) : ?>

                            <div class="<?php echo (!empty($card['headline']) || !empty($card['description'])) ? 'col-5' : 'col-12' ?> col-md-12 mb-md-3">
                                <div class="p">
                                    <?php if (!empty($include_links_in_cards)) : ?>
                                    <?php if ($card['link']->get_type() === 'image') : ?>
                                    <a class="mb-4" href="#"
                                       class="js-show-img"
                                       data-image-url="<?php echo $card['link']->get_image('url') ?>"
                                       data-image-alt="<?php echo $card['link']->get_image('alt') ?>"
                                       data-toggle="modal"
                                       data-target=".image-modal"
                                    >
                                        <?php elseif ($card['link']->get_type() === 'video') : ?>
                                            <div class="play__link play__link--small play__link--small--cards js-play-video"
                                                 data-videotype="<?php echo $card['link']->get_video_type() ?>"
                                                 data-videoid="<?php echo $card['link']->get_video_id() ?>"
                                                 data-target=".videos-modal"
                                                 data-toggle="modal">
                                                <svg class="icon icon-play-filled">
                                                    <use xlink:href="#icon-play-filled"></use>
                                                </svg>
                                            </div>
                                        <?php else : ?>
                                        <a class="mb-4" href="<?php echo $card['link']->get_url() ?>">
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <img class="w-100 lazy"
                                                 data-src="<?php echo $card['image']['url'] ?>"
                                                 alt="<?php echo $card['image']['alt']; ?>"/>
                                            <?php if (!empty($include_links_in_cards)) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($include_links_in_cards) || !empty($card['headline']) || !empty($card['description'])) : ?>
                            <div class="<?php echo ($card['image']) ? 'col-7' : 'col-12' ?> <?php echo($include_images_in_cards === false ? 'text-center' : '') ?> col-md-12 align-self-center">
                                <?php if (!empty($include_links_in_cards) && !empty($card['link']->get_label())) : ?>
                                    <?php $card['link']->output(); ?>
                                <?php elseif (empty($include_links_in_cards)) : ?>
                                    <h4 class="d-inline-block"><?php echo sanitize_text_field($card['headline']); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($card['description'])) : ?>
                                    <?php echo $card['description'] ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($buttons['has_primary_button'])) : ?>
            <p class="d-flex <?php echo $buttons['placement'] ?> mt-3 mt-md-5">
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
    </div>
</section>