<?php
/**
 * Module: Map
 *
 * Displays Map information.
 *
 * @package MJK
 */

$GLOBALS['google_maps_needed'] = true;

if( empty($map_markers) ) {
    $map_markers = array(
        array(
            'marker' => array(
                "lat"=> 1,
                "lng"=> 1
            ),
            'description' => 'Enter your description'
        ),
        array(
            'marker' => array(
                "lat"=> 2,
                "lng"=> 2
            ),
            'description' => 'Enter your description'
        )
    );
}

if( empty($background_color) ) {
    $background_color = 'bg-primary';
}

?>
<section id="<?php echo $id ?>" class="map block custom-block <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?>">
    <?php if ( $needs_container['needs_container'] === TRUE ) : ?>
    <div class="container">
    <?php endif; ?>

        <?php if ( ! empty($content) ) : ?>
        <div class="row" data-aos="fade">
            <div class="col-md-8 offset-md-2 mb-5">
                <?php echo $content ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="embed-responsive embed-responsive-16by9" data-aos="fade">
            <div class="acf-map">
                <?php
                foreach($map_markers as $value) :
                    $marker_location    = $value['marker']; // map marker data
                    $marker_description = $value['description']; // map marker description
                ?>
        
                <div class="marker" data-lat="<?php echo $marker_location['lat']; ?>" data-lng="<?php echo $marker_location['lng']; ?>">
                    <?php echo $marker_description ?>
                </div>
                <?php endforeach ?>
            </div>
        </div>

    <?php if ( $needs_container['needs_container'] === TRUE ) : ?>
    </div>
    <?php endif; ?>
    
</section>