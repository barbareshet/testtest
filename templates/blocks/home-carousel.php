<?php
/**
 * Module: Home Carousel
 *
 * @package MJK
 */

 $slides = get_field('slides');

?>

<div class="carousel-home" id="carousel">
    <div class="js-slick slider-hero-banner slider__home-carousel">

    <?php foreach( $slides as $i => $slide ) : 
        if($slide['type'] === 'video') : ?>

            <div class="slider__home-carousel__slide d-flex align-items-center" >
                <div class="w-100 h-100 lazy d-flex align-items-center slider__home-carousel__slide__bg" data-bg="url('<?php echo $slide['background_image']['url'] ?>')">
                    <div class="container">
                        <div class="slider__home-carousel__slide__content">
                            <div class="js-play-video slider__home-carousel__slide__video"
                                data-videotype="<?php echo $slide['video_type'] ?>"
                                data-videoid="<?php echo $slide['video_id'] ?>"
                                data-target=".videos-modal"
                                data-toggle="modal">
                                <img class="w-100 mb-2" src="<?php echo $slide['image']['url'] ?>" alt="<?php echo $slide['image']['alt'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-8 col-lg-7">
                                    <div class="h5 text-white float-left"><?php echo $slide['text'] ?></div>
                                </div>
                                <div class="col-4 col-lg-5 d-flex align-items-center justify-content-end">
                                    <?php
									if($slide['buttons']['has_secondary_button']){
										if($slide['buttons']['secondary_button']['type']['internal_link']){
											$secondary = new MJK\App\Blocks\Components\Link(
												$slide['buttons']['secondary_button'],
												array(
													"class" => "btn btn-primary btn-sm"
												)
											);
											$secondary->output();
										}
									}
					 
                                    $primary = new MJK\App\Blocks\Components\Link(
                                        $slide['buttons']['primary_button'],
                                        array(
                                            "class" => "btn btn-primary btn-sm"
                                        )
                                    );
                                    $primary->output();            
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif($slide['type'] === 'banner') : ?>

            <div class="slider__home-carousel__slide d-flex align-items-center justify-content-center ">
                <div class="w-100 h-100 lazy d-flex align-items-center slider__home-carousel__slide__bg" data-bg="url('<?php echo $slide['background_image']['url'] ?>')">
                    <div class="slider__home-carousel__slide__content d-flex align-items-center w-100">
                        <div class="container">
                            <div class="h3 text-uppercase text-white text-center"><?php echo $slide['text'] ?></div>
                            <div class="d-flex justify-content-center">
                                <?php 
                                    $primary = new MJK\App\Blocks\Components\Link(
                                        $slide['buttons']['primary_button'],
                                        array(
                                            "class" => "btn btn-primary btn-lg btn-outline-white"
                                        )
                                    );
                                    $primary->output();            
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>

        <div class="slider__home-carousel__slide slider__home-carousel__slide--thinker d-flex align-items-center text-white">
            <div class="w-100 h-100 lazy d-flex align-items-center justify-content-end slider__home-carousel__slide__bg" data-bg="url('<?php echo $slide['background_image']['url'] ?>')">
                <div class="slider__home-carousel__slide__content d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="h3 text-uppercase text-white float-right mb-3"><?php echo $slide['text'] ?></div>                        
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-5 col-7 offset-xl-4 col-xl-8">
                                <?php gravity_form($slide['form'], false, false, false, '', true, 1); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endif?>
    <?php endforeach; ?>
    </div>
</div>
