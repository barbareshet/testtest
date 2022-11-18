<script type="text/html" id="tmpl-first-post">
    <div class="card border-0">
        <# if( data.better_featured_image && data.better_featured_image.source_url.length > 0 ) { #>
        <div class="card-top d-flex justify-content-center align-items-center">
            <a href="{{ data.link }}">
                <img class="card-img-top w-100" src="{{ data.better_featured_image.source_url }}" alt="{{ data.better_featured_image.alt_text }}">
            </a>
        </div>
        <# } #>
        <div class="card-body p-0 pt-4">
            <# if( data.title.rendered.length > 0 ) { #>
            <h4 class="card-title mb-0">
                <a href="{{data.link}}">{{data.title.rendered}}</a>
            </h4>
            <# } #>
            <# if( data.date.length > 0 ) { #>
            <p class="card-text result__date">{{data.date_formatted}}</p>
            <# } #>
            <# if( data.post_excerpt.length > 0 ) { #>
            <p class="card-text result__excerpt">
                {{{ data.post_excerpt }}}
                ...<a class="result__excerpt__more" href="{{ data.link }}">More</a>
            </p>
            <# } #>
        </div>
    </div>
</script>