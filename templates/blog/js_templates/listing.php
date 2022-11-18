<script type="text/html" id="tmpl-blog-listing">
    <article class="row result">
        <# if( data.better_featured_image &&
        data.better_featured_image.media_details &&
        data.better_featured_image.media_details.sizes &&
        data.better_featured_image.media_details.sizes.woocommerce_single &&
        data.better_featured_image.media_details.sizes.woocommerce_single.source_url ) { #>
        <div class="col-md-7 col-lg-6 col-xl-5 m-0">
            <a href="{{ data.link }}">
                <img src="{{ data.better_featured_image.media_details.sizes.woocommerce_single.source_url }}"
                     alt="{{ data.better_featured_image.alt_text }}" class="img-fluid lazy">
            </a>
        </div>
        <# } #>
        <# if( data.better_featured_image &&
        data.better_featured_image.media_details &&
        data.better_featured_image.media_details.sizes &&
        data.better_featured_image.media_details.sizes.woocommerce_single &&
        data.better_featured_image.media_details.sizes.woocommerce_single.source_url ) { #>
        <div class="col-md-5 col-lg-6 col-xl-7">
            <# } else { #>
            <div class="col-md-12">
                <# } #>
                <h4 class="mb-0 mb-md-1 mb-xl-2">
                    <a href="{{ data.link }}" rel="bookmark">{{ data.title.rendered }}</a>
                </h4>
                <# if( data.date.length > 0 ) { #>
                <div class="result__date mb-0 mb-md-1 mb-xl-2">
                    <p class="d-inline">{{ data.date_formatted }}</p> |
                    <# if( data.category && data.category[0] ) { #>
                    <a href="/category/{{ data.category[0].slug }}" class="d-inline">{{ data.category[0].name }}</a>
                    <# } #>
                </div>
                <# } #>
                <# if( data.post_excerpt.length > 0 ) { #>
                <p class="result__excerpt">
                    {{ data.post_excerpt }}
                    ...<a class="result__excerpt__more" href="{{ data.link }}"><?php echo __('More') ?></a>
                </p>
                <# } #>
            </div>
    </article>

</script>
