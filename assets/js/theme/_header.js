// import { once } from "cluster";

var header = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        var mobileMenuBreakPoint = 1200;
        var position = 0;
        var moving = false;
        var mobileMenu = $('.navbar-collapse');
        var main = $('.navbar-nav');

        if ($(window).width() < mobileMenuBreakPoint) {
            $('.dropdown > .nav-link').on('click', function (event) {
                event.preventDefault();
                var $this = $(this),
                    listItem = $this.closest('.nav-item'),
                    subMenu = listItem.find('.dropdown-menu').first();
                subMenu.css('left', '0');
                subMenu.css('min-height', subMenu.closest('#menu-test').height());
                subMenu.show();
            });
        }

        $(window).resize(function () {
            clearTimeout(resizeTimer);
            var resizeTimer = setTimeout(function () {
                if ($(window).width() > mobileMenuBreakPoint) {
                    $('.dropdown-menu').removeAttr("style");
                }
            }, 250);
        });

        $('.menu-icon').on('click', function (event) {
            // if button has been clicked more than once, return
            var $this = $(this);
            var clickNum = $this.data('clickNum');
            if (!clickNum) clickNum = 1;
            $this.data('clickNum', ++clickNum);

            if (clickNum > 2) return

            $('.dropdown .nav-link').each(function () {
                var url = $(this).attr('href');
                var text = $(this).text();
                var subChildMenu = $(this).next('ul');
                subChildMenu.prepend(
                    '<li class="li--top d-xl-none"><a href="#" class="back-btn d-xl-none d-inline"></a><a href="' +
                    url + '" class="nav-link nav-link--top font-weight-bold d-inline" role="button">' + text +
                    '</a></li>'
                );
            });
        });

        // need to do document.on click because the back-btn was dynamically created
        $(document).on('click', '.back-btn', function (event) {
            event.preventDefault();
            var $this = $(this),
                subMenu = $this.closest('.dropdown-menu');
            subMenu.css('left', '100%');
        });

        mobileMenu.find('a').each(function () {
            var subChildMenu = $(this).next('ul');
            if (subChildMenu.hasClass('dropdown-menu')) {
                main.css('left', '0%');
            }
        });

        $('input[type="file"]').change(function () {
            var filename = this.value.match(/[^\\\/]+$/, '')[0];
            $('.upload-path').text(filename);
        });

        $('<span class="upload-path"></span>').insertBefore('.ginput_container_post_image');

    };

    return pub;

}(jQuery));