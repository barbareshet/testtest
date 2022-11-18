<?php
/**
 * Default search form.
 *
 * @package MJK
 */

?>

<form role="search" method="get" class="input-group order-4" action="<?php echo get_home_url(); ?>">
    <input type="search" class="form-control"
        placeholder="<?php _e( 'Search', 'mjk' ) ?>"
        value="<?php echo get_search_query() ?>" 
        name="s"
        title="<?php _e( 'Search', 'mjk' ) ?>" />
    <div class="input-group-append">
        <input type="submit" 
        class="btn btn-search" 
        value="" />
    </div>
</form>