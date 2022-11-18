<?php
/**
 * Module: Form
 *
 * Displays a form.
 *
 * @package MJK
 */

?>

<section id="<?php echo $id ?>" class="form block <?php echo $background_color['spacing'] ?> custom-block <?php echo $background_color['background_color'] ?>" data-aos="fade">
    <?php if ( $needs_container['needs_container'] === TRUE ) : ?>
    <div class="container">
    <?php endif; ?>
<!--        Contact-->
    <?php if ( ! empty($content) ) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-5">
            <?php echo $content ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="offset-md-1 col-md-10">
            <?php gravity_form($form, true, true, false, '', true, 1); ?>
        </div>
    </div>

    <?php if ( $needs_container['needs_container'] === TRUE ) : ?>
    </div>
    <?php endif; ?>
</section>