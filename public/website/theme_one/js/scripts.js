
jQuery(document).ready(function () {

    /*
     Wow
     */
    new WOW().init();

    /*
     Slider
     */
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        prevText: "",
        nextText: ""
    });

    /*
     Slider 2
     */
    $('.slider-2-container').backstretch([
        "public/website/theme_one/img/slider/5.jpg"
                , "public/website/theme_one/img/slider/6.jpg"
                , "public/website/theme_one/img/slider/7.jpg"
    ], {duration: 3000, fade: 750});

    /*
     Image popup (home latest work)
     */
    $('.view-work').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: 'The image could not be loaded.',
            titleSrc: function (item) {
                return item.el.parent('.work-bottom').siblings('img').attr('alt');
            }
        },
        callbacks: {
            elementParse: function (item) {
                item.src = item.el.attr('href');
            }
        }
    });

   


});


jQuery(window).load(function () {

    /*
     Portfolio
     */
    $('.portfolio-masonry').masonry({
        columnWidth: '.portfolio-box',
        itemSelector: '.portfolio-box',
        transitionDuration: '0.5s'
    });

    $('.portfolio-filters a').on('click', function (e) {
        e.preventDefault();
        if (!$(this).hasClass('active')) {
            $('.portfolio-filters a').removeClass('active');
            var clicked_filter = $(this).attr('class').replace('filter-', '');
            $(this).addClass('active');
            if (clicked_filter != 'all') {
                $('.portfolio-box:not(.' + clicked_filter + ')').css('display', 'none');
                $('.portfolio-box:not(.' + clicked_filter + ')').removeClass('portfolio-box');
                $('.' + clicked_filter).addClass('portfolio-box');
                $('.' + clicked_filter).css('display', 'block');
                $('.portfolio-masonry').masonry();
            } else {
                $('.portfolio-masonry > div').addClass('portfolio-box');
                $('.portfolio-masonry > div').css('display', 'block');
                $('.portfolio-masonry').masonry();
            }
        }
    });

    $(window).on('resize', function () {
        $('.portfolio-masonry').masonry();
    });

    // image popup	
    $('.portfolio-box').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: 'The image could not be loaded.',
            titleSrc: function (item) {
                return item.el.text();
            }
        },
        callbacks: {
            elementParse: function (item) {

                var box_container = item.el.find('.portfolio-box-container');
                if (box_container.hasClass('portfolio-video')) {
                    item.type = 'iframe';
                    item.src = box_container.data('portfolio-big');
                } else {
                    item.type = 'image';
                    item.src = box_container.find('img').attr('src');
                }
            }
        }
    });

    /*
     Hidden images
     */
    $(".testimonial-image img, .portfolio-box img").attr("style", "width: auto !important; height: auto !important;");

});
