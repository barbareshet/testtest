<?php
/**
 * Template part for displaying the entry footer.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MJK
 */
?>

<footer class="entry__footer">
    <?php
    hybrid_post_terms( array(
        'taxonomy' => 'category',
        'text'     => __( 'Posted in: %s', 'mjk' )
    ) );

    edit_post_link( __( 'Edit', 'mjk' ), '<span class="edit-link">', '</span>' );
    ?>
</footer><!-- /.entry__footer -->
