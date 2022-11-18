<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package MJK
 */
?>

<section class="no-results not-found">

    <header class="page__header">
        <h2>
            <?php __( 'Nothing Found', 'mjk' ); ?>
        </h2>
    </header><!-- .entry__header -->

    <div class="page__content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) {

            printf( __( '<p>Ready to publish your first post? <a href="%1$s">Get started here</a>.</p>', 'mjk' ), esc_url( admin_url( 'post-new.php' ) ) );

        } elseif ( is_search() ) {

            __( '<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>', 'mjk' );
            get_search_form();

        } else {

            __( '<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>', 'mjk' );
            get_search_form();

        }
        ?>
    </div><!-- .page__content -->

</section><!-- .no-results -->
