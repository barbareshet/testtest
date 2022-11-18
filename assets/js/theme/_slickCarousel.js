/**
 *  Slick Carousel
 *
 *  Initializes a Slick Carousel.
 */
var slickCarousel = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        $('.slider-hero:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                arrows: true,
                dots: true,
                speed: 500
            };

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

        $('.slider-hero-banner:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                speed: 500,
                rows: 1,
                arrows: true,
                infinite: true,
                slidesToShow: 3,
                responsive: [{
                        breakpoint: 767,
                        settings: {
                            rows: 1,
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            rows: 1,
                            slidesToShow: 2
                        }
                    }
                ]
            }

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

        $('.js-carousel-slider:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                arrows: false,
                dots: true,
                mobileFirst: true,
                speed: 500,
                responsive: [{
                    breakpoint: 767,
                    settings: {
                        draggable: false
                    }
                }]
            };

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

        $('.slider-testimonials:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                arrows: true,
                dots: true,
                speed: 500
            };

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

        $('.slider-hero-quotes:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                arrows: false,
                autoplay: true,
                autoplaySpeed: 10000,
                dots: true,
                speed: 500
            };

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

        $('.slider-images:not(.slick-initialized)').each(function () {
            var carousel = $(this);
            var carouselOptions = {
                arrows: true,
                dots: true,
                speed: 500,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false
                    }
                }]
            };

            // Initialize carousel
            carousel.slick(carouselOptions);
        });

    };

    return pub;

}(jQuery));