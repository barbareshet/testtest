<?php 

$social_shares = get_field("social_modal_shares", "option");

if ( empty($social_shares) || is_home() ) return false;
?>
<div class="site-content__utility bg-primary">
    <div class="container d-flex justify-content-end">
        <?php if ( ! is_home() ) { ?>
        <div class="breadcrumbs">
            <?php 
            if ( function_exists('bcn_display')) {
                bcn_display();
            }
            ?>
        </div>
        <?php } ?>
    </div>
</div>