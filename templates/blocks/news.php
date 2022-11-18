<?php
/**
 * Module: News
 *
 * Displays the most recent news posts.
 *
 * @package MJK
 */

 $select = get_sub_field( 'select_posts' );
 $image = get_sub_field( 'image' );
 $arrow = MJK_THEME_PATH_URL . 'assets/images/Chevron_Right.svg';

 switch ( $select ) {
     case 'automatically' :
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish'
        );

        $posts = get_posts( $args );
        break;

     case 'manually' :
        $posts = get_sub_field( 'posts' );
        break;
 }

?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center flex-row" data-aos="fade">
        <h2 class="text-gray mb-2 mb-sm-4 h1">News & Events</h2>
        <a class="text-primary d-md-none" href="#">View All
            <span><img src="<?php echo $arrow; ?>" alt=""></span>
        </a>
    </div>
    <div class="row" data-aos="fade">
        <div class="col-md-6">
            <img class="w-100 mb-4 mb-md-0" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
        </div>
        <div class="col-md-6">
            <hr class="d-none d-md-block mt-0">

            <?php foreach( $posts as $i => $post ) : ?>
                <?php
                // Use to call the post title
                get_the_title( $post->ID);

                // Use this to get the permalink 
                get_the_permalink( $post->ID );
                ?>

                <div class="row my-4">
                    <div class="col-10 col-sm-11">
                        <a href="<?php echo get_the_permalink( $post->ID ); ?>" class="text-primary"><?php echo get_the_title( $post->ID); ?></a>
                    </div>
                    <div class="col-1 d-flex justify-content-end align-items-center">
                        <a class="text-primary" href="<?php echo get_the_permalink( $post->ID ); ?>">
                            <img src="<?php echo $arrow ?>" alt="">
                        </a>
                    </div>
                </div>

                <hr class="mb-0">

            <?php endforeach; ?>

            <!-- <hr class="d-none d-md-block mb-0"> -->

        </div>
    </div>
</div>

<?php wp_reset_postdata(); ?>