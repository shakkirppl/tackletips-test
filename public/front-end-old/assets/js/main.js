(function($) {
    "use strict";
    $(window).on('load', function() {
        $('.tp-banner').show().revolution({
            dottedOverlay: "none",
            delay: 9000,
            startwidth: 1170,
            startheight:400,
            hideThumbs: 200,
            thumbWidth: 100,
            thumbHeight: 50,
            thumbAmount: 5,
            navigationType: "bullet",
            navigationArrows: "solo",
            navigationStyle: "preview4",
            touchenabled: "on",
            onHoverStop: "on",
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
            parallax: "mouse",
            parallaxBgFreeze: "on",
            parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
            keyboardNavigation: "off",
            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 0,
            navigationVOffset: 20,
            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,
            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,
            shadow: 0,
            fullWidth: "on",
            fullScreen: "off",
            spinner: "spinner1",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            forceFullWidth: "off",
            hideThumbsOnMobile: "off",
            hideNavDelayOnMobile: 1500,
            hideBulletsOnMobile: "off",
            hideArrowsOnMobile: "off",
            hideThumbsUnderResolution: 0,
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ""
        });
        $('#preloader').fadeOut();
        $('.btn-cart').tooltip({
            title: "Add to Cart",
        });
        $('.btn-wish').tooltip({
            title: "Wishlist",
        });
        $('.btn-quickview').tooltip({
            title: "Quick View",
        });
        $('.selectpicker').selectpicker({
            style: 'btn-select',
            size: 4
        });
        $('.mobile-menu').slicknav({
            prependTo: '.navbar-header',
            parentTag: 'liner',
            allowParentLinks: true,
            duplicate: true,
            label: '',
            closedSymbol: '<i class="fa fa-angle-right"></i>',
            openedSymbol: '<i class="fa fa-angle-down"></i>',
        });
        $('.lightbox').nivoLightbox({
            effect: 'fadeScale',
            keyboardNav: true,
        });
        $(".nav > li:has(ul)").addClass("drop");
        $(".nav > li.drop > ul").addClass("dropdown");
        $(".nav > li.drop > ul.dropdown ul").addClass("sup-dropdown");
        var owl = $("#new-products");
        owl.owlCarousel({
            navigation: true,
            pagination: false,
            autoPlay: true,
            items: 4,
            itemsTablet: 3,
            stagePadding: 90,
            smartSpeed: 450,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [980, 3],
            itemsTablet: [768, 3],
            itemsTablet: [767, 2],
            itemsTabletSmall: [480, 1],
            itemsMobile: [479, 1],
        });
          var owl = $("#featured");
        owl.owlCarousel({
            navigation: true,
            pagination: false,
            autoPlay: true,
            items: 4,
            itemsTablet: 3,
            stagePadding: 90,
            smartSpeed: 450,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [980, 3],
            itemsTablet: [768, 3],
            itemsTablet: [767, 2],
            itemsTabletSmall: [480, 1],
            itemsMobile: [479, 1],
        });
        
        
        var owl = $("#client-logo");
        owl.owlCarousel({
            navigation: true,
            pagination: false,
            autoPlay: true,
            items: 6,
            itemsTablet: 3,
            stagePadding: 90,
            smartSpeed: 450,
            itemsDesktop: [1199, 5],
            itemsDesktopSmall: [980, 4],
            itemsTablet: [768, 4],
            itemsTablet: [767, 4],
            itemsTabletSmall: [480, 4],
            itemsMobile: [479, 3],
        });
        var owl = $(".testimonials-carousel");
        owl.owlCarousel({
            navigation: false,
            pagination: true,
            slideSpeed: 1000,
            stopOnHover: true,
            autoPlay: true,
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [980, 1],
            itemsTablet: [768, 1],
            itemsTablet: [767, 1],
            itemsTabletSmall: [480, 1],
            itemsMobile: [479, 1],
        });
        var owl = $(".touch-slider");
        owl.owlCarousel({
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            stopOnHover: true,
            autoPlay: true,
            items: 1,
            itemsDesktopSmall: [1024, 1],
            itemsTablet: [600, 1],
            itemsMobile: [479, 1]
        });
        var newProducts = $('#new-products');
        newProducts.find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
        newProducts.find('.owl-next').html('<i class="fa fa-angle-right"></i>');
        var testiCarousel = $('.testimonials-carousel');
        testiCarousel.find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
        testiCarousel.find('.owl-next').html('<i class="fa fa-angle-right"></i>');
        var touchSlider = $('.touch-slider');
        touchSlider.find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
        touchSlider.find('.owl-next').html('<i class="fa fa-angle-right"></i>');
         var touchSlider = $('#client-logo');
        touchSlider.find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
        touchSlider.find('.owl-next').html('<i class="fa fa-angle-right"></i>');
         var touchSlider = $('#featured');
        touchSlider.find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
        touchSlider.find('.owl-next').html('<i class="fa fa-angle-right"></i>');
        var owl;
        owl = $("#owl-demo");
        owl.owlCarousel({
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            afterInit: afterOWLinit,
            afterUpdate: afterOWLinit
        });

        function afterOWLinit() {
            $('.owl-controls .owl-page').append('<a class="item-link" />');
            var pafinatorsLink = $('.owl-controls .item-link');
            $.each(this.owl.userItems, function(i) {
                $(pafinatorsLink[i]).css({
                    'background': 'url(' + $(this).find('img').attr('src') + ') center center no-repeat',
                    '-webkit-background-size': 'cover',
                    '-moz-background-size': 'cover',
                    '-o-background-size': 'cover',
                    'background-size': 'cover'
                }).on('click', function() {
                    owl.trigger('owl.goTo', i);
                });
            });
            $('.owl-pagination').prepend('<a href="#prev" class="prev-owl"/>');
            $('.owl-pagination').append('<a href="#next" class="next-owl"/>');
            $(".next-owl").on('click', function() {
                owl.trigger('owl.next');
            });
            $(".prev-owl").on('click', function() {
                owl.trigger('owl.prev');
            });
        }
        var o = $('.toggle');
        $(window).on('load', function() {
            $('.toggle').on('click', function(e) {
                e.preventDefault();
                var tmp = $(this);
                o.each(function() {
                    if ($(this).hasClass('active') && !$(this).is(tmp)) {
                        $(this).parent().find('.toggle_cont').slideToggle();
                        $(this).removeClass('active');
                    }
                });
                $(this).toggleClass('active');
                $(this).parent().find('.toggle_cont').slideToggle();
            });
            $(window).on('click touchstart', function(e) {
                var container = $(".toggle-wrap");
                if (!container.is(e.target) && container.has(e.target).length === 0 && container.find('.toggle').hasClass('active')) {
                    container.find('.active').toggleClass('active').parent().find('.toggle_cont').slideToggle();
                }
            });
        });
        var offset = 200;
        var duration = 500;
        $(window).scroll(function() {
            if ($(this).scrollTop() > offset) {
                $('.back-to-top').fadeIn(400);
            } else {
                $('.back-to-top').fadeOut(400);
            }
        });
        $('.back-to-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        });
        var sliderItem = $('.slider-for');
        var sliderNav = $('.slider-nav');
        sliderItem.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        sliderNav.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }, ],
        });
        $("div.color-list .color").on('click', function(e) {
            e.preventDefault();
            $(this).parent().find(".color").removeClass("active");
            $(this).addClass("active");
        });
    });
}(jQuery));