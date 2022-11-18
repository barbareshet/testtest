<?php
/**
 * Module: Text
 *
 * Displays a block of text.
 *
 * @package MJK
 */

if ( empty($content) ) {
    $content = "Enter your content...";
}

if( empty( $background_color['background_color'] ) ) {
    $background_color['background_color'] = 'bg-white';
}

if( empty($background_color['spacing']) ) {
    $background_color['spacing'] = "needs-spacing-medium";
}

if( empty($background_color['spacing']) ) {
    $background_color['spacing'] = "needs-spacing-medium";
}

?>

<section id="<?php echo $id ?>" class="text block custom-block <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?>" style="<?php echo ! empty( $background_image['url'] ) ? 'background-image:url(' . $background_image['url'] . ')' : '' ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2" data-aos="fade">
                <?php echo $content ?>
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
</section>