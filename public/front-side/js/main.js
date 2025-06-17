jQuery(document).ready(function() {
    "use strict";
    jQuery('.newsletter-close').click(function() {
        jQuery(".newsletter-wrap").hide();
        jQuery(".newsletter-bg").hide();
    });
    jQuery("#best-sale-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#best-sale-slider5 .slider-items").owlCarousel({
        items: 2,
        itemsDesktop: [1024, 2],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#new-arrivals-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#new-arrivals-slider5 .slider-items").owlCarousel({
        items: 2,
        itemsDesktop: [1024, 2],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#new-arrivals-slider3 .slider-items").owlCarousel({
        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#special-products-slider3 .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 2],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#new-product-slider .slider-items").owlCarousel({
        items: 5,
        itemsDesktop: [1024, 5],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 2],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: false
    }), jQuery("#new-product-slider5 .slider-items").owlCarousel({
        items: 2,
        itemsDesktop: [1024, 2],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#top-sellers-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#top-sellers-slider5 .slider-items").owlCarousel({
        items: 2,
        itemsDesktop: [1024, 2],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#top-sellers-slider3 .slider-items").owlCarousel({
        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#our-clients-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 2],
        itemsMobile: [480, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#our-clients-slider3 .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 2],
        itemsMobile: [480, 1],
        navigation: false,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: false,
        autoPlay: true
    }), jQuery("#latest-news-slider .slider-items").owlCarousel({
        autoplay: !0,
        items: 3,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [480, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1
    }), jQuery("#hot-deals-slider .slider-items").owlCarousel({
        items: 1,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [900, 1],
        itemsTablet: [600, 1],
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false,
        autoPlay: true,
    });
    jQuery("#hot-deals-slider5 .slider-items").owlCarousel({
        items: 1,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [900, 1],
        itemsTablet: [600, 1],
        itemsMobile: [320, 1],
        navigation: false,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false,
        autoPlay: true,
    });
    jQuery("#mobile-menu").mobileMenu({
        MenuWidth: 250,
        SlideSpeed: 300,
        WindowsMaxWidth: 767,
        PagePush: !0,
        FromLeft: !0,
        Overlay: !0,
        CollapseMenu: !0,
        ClassName: "mobile-menu"
    }), jQuery('.mega-menu-title').on('click', function() {
        if (jQuery('.mega-menu-category').is(':visible')) {
            jQuery('.mega-menu-category').slideUp();
        } else {
            jQuery('.mega-menu-category').slideDown();
        }
    });
    jQuery('.mega-menu-category .nav > li').hover(function() {
        jQuery(this).addClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeIn('slow');
    }, function() {
        jQuery(this).removeClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeOut('slow');
    });
    jQuery('.mega-menu-category .nav > li.view-more').on('click', function(e) {
        if (jQuery('.mega-menu-category .nav > li.more-menu').is(':visible')) {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideUp();
            jQuery(this).find('a').text('More category');
        } else {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideDown();
            jQuery(this).find('a').text('Close menu');
        }
        e.preventDefault();
    });
    jQuery("#category-desc-slider .slider-items").owlCarousel({
        autoPlay: true,
        items: 1,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [900, 1],
        itemsTablet: [600, 1],
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    jQuery("#upsell-product-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: false
    }), jQuery("#related-product-slider .slider-items").owlCarousel({
        items: 4,
        itemsDesktop: [1024, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#related-posts .slider-items").owlCarousel({
        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [640, 2],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1,
        autoPlay: true
    }), jQuery("#testimonials-slider .slider-items").owlCarousel({
        items: 1,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [900, 1],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: false,
        autoPlay: true
    }), jQuery(".subDropdown")[0] && jQuery(".subDropdown").click(function() {
        jQuery(this).toggleClass("plus"), jQuery(this).toggleClass("minus"), jQuery(this).parent().find("ul").slideToggle()
    })
    if (jQuery('#home-testimonials-slider').length) {
        jQuery('#home-testimonials-slider').bxSlider({
            auto: true,
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }
    jQuery('.slider-range-price').each(function() {
        var min = jQuery(this).data('min');
        var max = jQuery(this).data('max');
        var unit = jQuery(this).data('unit');
        var value_min = jQuery(this).data('value-min');
        var value_max = jQuery(this).data('value-max');
        var label_reasult = jQuery(this).data('label-reasult');
        var t = jQuery(this);
        jQuery(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function(event, ui) {
                var result = label_reasult + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.amount-range-price').html(result);
            }
        });
    })
    jQuery(".collapsed-block .expander").click(function(e) {
        var collapse_content_selector = jQuery(this).attr("href");
        var expander = jQuery(this);
        if (!jQuery(collapse_content_selector).hasClass("open")) expander.addClass("open").html("&minus;");
        else expander.removeClass("open").html("+");
        if (!jQuery(collapse_content_selector).hasClass("open")) jQuery(collapse_content_selector).addClass("open").slideDown("normal");
        else jQuery(collapse_content_selector).removeClass("open").slideUp("normal");
        e.preventDefault()
    });
    jQuery(function() {
        jQuery(".category-sidebar ul > li.cat-item.cat-parent > ul").hide();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat-parent > ul").show();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat.cat-parent > ul").show();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent").click(function() {
            if (jQuery(this).hasClass('current-cat-parent')) {
                var li = jQuery(this).closest('li');
                li.find(' > ul').slideToggle('fast');
                jQuery(this).toggleClass("close-cat");
            } else {
                var li = jQuery(this).closest('li');
                li.find(' > ul').slideToggle('fast');
                jQuery(this).toggleClass("cat-item.cat-parent open-cat");
            }
        });
        jQuery(".category-sidebar ul.children li.cat-item,ul.children li.cat-item > a").click(function(e) {
            e.stopPropagation();
        });
    });
    jQuery("#colosebut1").click(function() {
        jQuery("#div1").fadeOut("slow");
    });
    jQuery("#colosebut2").click(function() {
        jQuery("#div2").fadeOut("slow");
    });
    jQuery("#colosebut3").click(function() {
        jQuery("#div3").fadeOut("slow");
    });
    jQuery("#colosebut4").click(function() {
        jQuery("#div4").fadeOut("slow");
    });
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        jQueryback_to_top = jQuery('.totop');
    jQuery(window).scroll(function() {
        (jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('totop-is-visible'): jQueryback_to_top.removeClass('totop-is-visible totop-fade-out');
        if (jQuery(this).scrollTop() > offset_opacity) {
            jQueryback_to_top.addClass('totop-fade-out');
        }
    });
    jQueryback_to_top.on('click', function(event) {
        event.preventDefault();
        jQuery('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });
    jQuery('[data-toggle="tooltip"]').tooltip();
    if (jQuery.fn.owlCarousel) {
        jQuery("#clients-1").owlCarousel({
            autoPlay: 3000,
            items: 6,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
        jQuery("#testimonial-2").owlCarousel({
            autoPlay: 3000,
            items: 1
        });
        jQuery("#testimonial-3").owlCarousel({
            autoPlay: 4000,
            items: 1
        });
        jQuery("#testimonial-4").owlCarousel({
            autoPlay: 3000,
            items: 1
        });
        jQuery("#testimonial-5").owlCarousel({
            autoPlay: 3000,
            items: 1
        });
        jQuery("#carousel-object").owlCarousel({
            autoPlay: 4000,
            items: 1
        });
        jQuery("#owl-slider").owlCarousel({
            autoPlay: 4000,
            items: 1,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        jQuery("#img-carousel").owlCarousel({
            autoPlay: 3000,
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
    }
    if (typeof Typist == 'function') {
        new Typist(document.querySelector('.typist-element'), {
            letterInterval: 60,
            textInterval: 3000
        });
    }
})
jQuery(window).scroll(function() {
        jQuery(this).scrollTop() > 1 ? jQuery("nav").addClass("stick") : jQuery("nav").removeClass("stick"), jQuery(this).scrollTop() > 1 ? jQuery(".top-cart").addClass("stick") : jQuery(".top-cart").removeClass("stick")
    }),
    function(e) {}(jQuery), jQuery.extend(jQuery.easing, {}),
    function(e) {
        e.fn.extend({
            accordion: function() {}
        })
    }(jQuery), jQuery(function(e) {
        e(".accordion").accordion(), e(".accordion").each(function() {
            var t = e(this).find("li.active");
            t.each(function(n) {
                e(this).children("ul").css("display", "block"), n == t.length - 1 && e(this).addClass("current")
            })
        })
    }),
    function(e) {
        e.fn.extend({}), jQuery(function() {
            function e() {
                var e = jQuery('.navbar-collapse form[role="search"].active');
                e.find("input").val(""), e.removeClass("active")
            }
            jQuery('.navbar-collapse form[role="search"] button[type="reset"]').on("click keyup", function(t) {
                console.log(t.currentTarget), (27 == t.which && jQuery('.navbar-collapse form[role="search"]').hasClass("active") || "reset" == jQuery(t.currentTarget).attr("type")) && e()
            }), jQuery(document).on("click", '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(e) {
                e.preventDefault();
                var t = jQuery(this).closest("form"),
                    n = t.find("input");
                t.addClass("active"), n.focus()
            }), jQuery(document).on("click", '.navbar-collapse form[role="search"].active button[type="submit"]', function(t) {
                t.preventDefault();
                var n = jQuery(this).closest("form"),
                    i = n.find("input");
                jQuery("#showSearchTerm").text(i.val()), e()
            })
        })
    }(jQuery);