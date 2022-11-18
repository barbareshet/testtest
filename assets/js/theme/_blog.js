/**
 *  Blog
 *
 *  Generates the blog listing data
 */

var blog = (function ($) {

    let pub = {
        wp_api: '/wp-json/wp/v2/posts',
        current_category: null,
        current_page: 1
    }; //public facing functions

    pub._getPostsOnScroll = function() {
        if ( ($(window).scrollTop() == $(document).height() - $(window).height()) && pub.loading === false ) {
            pub.loading = true;
            pub.getPosts(global.is_blog_single, true);
        }
    }

    pub._init = function () {
        if ( ! $("#postsForm").length === 0 ) return false;

        if (util.getQueryString().search) {
            $("#postsForm #search").val(util.getQueryString().search);
        }

        $('#postsForm #category').on('change', function(e){
            e.preventDefault();
            pub.current_page = 1;

            if ( global.is_blog ) {
                pub.current_category = global.categories.find(category => category.term_id == $("#postsForm #category").val());
                document.title = (pub.current_category.seo_title) ? pub.current_category.seo_title : pub.current_category.name;
                window.browserHistory.push('/category/'+pub.current_category.slug+"/");
            }

            pub.getPosts(global.is_blog_single);

        });

        $('#postsForm :checkbox').on('change', function(e){
            e.preventDefault();
            pub.current_page = 1;
            pub.getPosts(global.is_blog_single);
        });

        $('#postsForm #search').on('change', function(e){
            e.preventDefault();
            pub.current_page = 1;
            pub.getPosts(global.is_blog_single);
        });

        $('#postsForm').on('submit', function(e){
            e.preventDefault();
            pub.current_page = 1;
            pub.getPosts(global.is_blog_single);
        });

        if ( ! global.is_blog_single ) {
            pub.getPosts(global.is_blog_single);
        }
    };

    pub.getPosts = function (isBlogSingle, newPage) {
        var $postsForm = $("#postsForm");

        let params = [];
        if ($postsForm.find("input:checked").length > 0) {
            let values = [];
            $postsForm.find('[name*="type"]:checked').each(function(i) {
                values.push($(this).val());
            });
            params.push("types=" + values.join(","));
        }

        if ($postsForm.find("#search").val()) {
            params.push("search=" + $postsForm.find("#search").val());
        }

        if ($postsForm.find("#category").val() !== "all") {
            params.push("categories=" + $postsForm.find("#category").val());
        }

        if ( isBlogSingle ) {

            window.location = $postsForm.attr("action") + "?" + params;

        } else {

            var $list_container = $('#posts');
            var $first_post_container = $('#first-post');

            if ( newPage ) {
                params.push("page="+pub.current_page);
                pub.current_page++;
            } else {
                $list_container.empty();
                $first_post_container.empty();
            }

            $(".blog-loader").show();

            $.ajax({
                type: 'GET',
                url: '/wp-json/wp/v2/posts',
                data: params.join("&"),
                dataType: "json",
                success: function (data, textStatus, request) {

                    console.log('data', data);

                    pub.total_pages = request.getResponseHeader('X-WP-TotalPages');

                    if(pub.total_pages == pub.current_page) {
                        $(window).off("scroll", pub._getPostsOnScroll);
                    } else {
                        $(window).on("scroll", pub._getPostsOnScroll);
                    }

                    $(".blog-loader").hide();
                    pub.loading = false;

                    if(data.length === 0) {
                        var noResultsTemplate = wp.template('no-results');
                        $first_post_container.html(noResultsTemplate());
                    } else {                        
                        var template = wp.template('blog-listing');
                        var template2 = wp.template('first-post');

                        if ( ! newPage ) {                            
                            pub.firstPost = data[0];
                            pub.firstPost.date_formatted = util.formatDate(pub.firstPost.date);
                            $first_post_container.html(template2(pub.firstPost));
                            data = data.slice(1, data.length);
                        }

                        $.each(data, function (key, value) {
                            value.date_formatted = util.formatDate(value.date);
                            $list_container.append(template(value));
                        });
                    }
                },
                error: function (request, status, error) {
                    $(".blog-loader").hide();
                    pub.loading = false;

                    $(window).off("scroll", pub._getPostsOnScroll);
                    var errorTemplate = wp.template('error');
                    var $first_post_container = $('#first-post');
                    $list_container.html(errorTemplate());
                }
            });
        }
    }

    return pub;

}(jQuery));
