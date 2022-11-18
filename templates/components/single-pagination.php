<?php
/**
 * Part: Single Pagination
 *
 * @package NHA
 */

$prev = get_previous_posts_link();
$next = get_next_posts_link();
?>

<hr>
<div class="pagination pagination__single">
    <div class="container d-flex justify-content-between">
        <div class="pagination-newer">
            <?php next_post_link( '%link', '<svg class="icon icon-chevron-left--sm"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-chevron-left--sm"></use></svg>Newer<span> Posts</span>' ); ?>
        </div>
    
        <div class="pagination-older">
            <?php previous_post_link( '%link', 'Older<span> Posts</span><svg class="icon icon-chevron-right--sm"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-chevron-right--sm"></use></svg>' ); ?>
        </div>
    </div>
</div>

<hr>