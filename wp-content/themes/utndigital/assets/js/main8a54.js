let scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    inertia: 0.4,
    smooth: true,
    getDirection: true,
    mobile: {
        inertia: 1,
        breakpoint: 0,
        smooth: false,
        getDirection: true,
        direction: 'vertical'
    },
    tablet: {
        inertia: 1,
        breakpoint: 0,
        smooth: false,
        getDirection: true,
        direction: 'vertical'
    },
});

$(window).on('load', function() {

    try {
        if ($('body.home').length) {
            setTimeout(() => {
                $('.preloader').addClass('animate');
                $('#page').addClass('loaded');
                setTimeout(() => {
                    $('.preloader').addClass('hidden');
                    loadPageAnimations();
                }, 1000);
                $('body').removeClass('no-scroll');
            }, 1200);
        } else {
            setTimeout(() => {
                $('.preloader').addClass('animate');
            }, 300);
            $('#page').addClass('loaded');
            setTimeout(() => {
                $('.preloader').addClass('hidden');
                loadPageAnimations();
            }, 1000);
            $('body').removeClass('no-scroll');
        }

    } catch (error) {
        $('.preloader').addClass('animate');
        $('#page').addClass('loaded');
        $('body').removeClass('no-scroll');
    }

    setTimeout(() => {
        init_animation();
    }, 500);

    function loadPageAnimations() {
        if (window.location.href.indexOf("/project/") > -1) {
            $('.projects-related-wrapper').addClass('is-inview');
            $('.single-work-banner-wrapper img').addClass('is-inview');
            $('.single-work-banner-wrapper .font-curtain').addClass('is-inview');
            $('.single-work-banner-wrapper .focus--mask').addClass('is-inview');
        } else if (window.location.href.indexOf("/contact") > -1) {
            $('.contact-title').addClass('is-inview');
            $('.email-wrapper').addClass('is-inview');
            $('.line-wrapper').addClass('is-inview');
            $('.address-wrapper').addClass('is-inview');
            $('.social-wrapper').addClass('is-inview');
        } else {
            $('.desktop-image').addClass('is-inview');
            $('.mobile-image').addClass('is-inview');
            $('.banner-content').addClass('is-inview');
            $('.banner-title').addClass('is-inview');
        }
    }

    $('.menu-menu-1-container').find('.current_page_item').addClass('active-page');

    if ($('body.home').length || window.location.href.indexOf("/about") > -1) {
        $('.main-logo svg path').css({ fill: '#fff' });
        $('.main-menu-icon span').css({ background: '#fff' });
    }

    if ($(window).width() <= 768) {
        $('.work-thumbnail').removeAttr('data-scroll-repeat');
        $(document).on('click', '.main-menu', function() {
            if ($(".main-menu-wrapper").hasClass("active")) {
                $("html").removeClass('mobile-no-scroll')
            } else {
                $("html").addClass('mobile-no-scroll')
            }
        })
    }
    // let scroll;
    function initScroll() {
        scroll = new LocomotiveScroll({
            el: document.querySelector('[data-scroll-container]'),
            inertia: 0.4,
            smooth: true,
            getDirection: true,
            mobile: {
                breakpoint: 0,
                smooth: true,
                getDirection: true,
            },
            tablet: {
                breakpoint: 0,
                smooth: true,
                getDirection: true,
            },
        });
    }

    // DISABLE SCROLL FOR BLOG
    // if(javascript_object.is_blog !== "1"){
    //     initScroll();
    // }
    if (window.location.href.indexOf("/cases/") <= -1 && $('body.home').length != 1) {
        setInterval(() => {
            scroll.update();
        }, 2000);
    }
    if (window.location.href.indexOf("/project/") > -1) {
        var project_font = $('.single-work-banner-wrapper .focus--mask').attr("class").split(/\s+/)[1];
        if (project_font == "font-white") {
            $('.main-logo svg path').css({ fill: '#fff' });
            $('.main-menu-icon span').css({ background: '#fff' });
        }
    }

    scroll.on('scroll', function(args) {
        if (typeof args.currentElements['project-related-stick'] === 'object') {
            $('.go-to-top').addClass('visible');
        } else {
            $('.go-to-top').removeClass('visible');
        }

        if (window.location.href.indexOf("/project/") > -1) {
            if (typeof args.currentElements['project-related-stick'] === 'object') {
                $('.projects-related').addClass('stick');
            } else {
                $('.projects-related').removeClass('stick');
            }
            if ($('.video-player-inner-wrapper').hasClass('autoplaying is-inview') && !$('.video-player').hasClass('playing')) {
                $('.video-pause').addClass('autoplaying');
                $('.video-play').addClass('autoplaying');
                $('.video-player').addClass('playing');
                $('.video-player').click();
            }
            if (typeof args.currentElements['project-banner'] === 'object') {
                if (project_font == "font-white" && !$(".main-menu-wrapper").hasClass("active")) {
                    $('.main-logo svg path').css({ fill: '#fff' });
                    $('.main-menu-icon span').css({ background: '#fff' });
                }
            } else {
                $('.main-logo svg path').css({ fill: '#000' });
                $('.main-menu-icon span').css({ background: '#000' });
            }
        }

        if ($('body.home').length && !$(".main-menu-wrapper").hasClass("active")) {
            if (typeof args.currentElements['home-banner'] === 'object') {
                $('.main-logo svg path').css({ fill: '#fff' });
                $('.main-menu-icon span').css({ background: '#fff' });
            } else {
                $('.main-logo svg path').css({ fill: '#141414' });
                $('.main-menu-icon span').css({ background: '#141414' });
            }
        }

        if (window.location.href.indexOf("/about") > -1 && !$(".main-menu-wrapper").hasClass("active")) {
            if (typeof args.currentElements['about-banner'] === 'object') {
                $('.main-logo svg path').css({ fill: '#fff' });
                $('.main-menu-icon span').css({ background: '#fff' });
            } else {
                $('.main-logo svg path').css({ fill: '#141414' });
                $('.main-menu-icon span').css({ background: '#141414' });
            }
        }

        if ($('body.home').length) {
            if (typeof args.currentElements['home-banner'] != 'object') {
                $('.scroll-indicator').addClass('hidden')
            }
        }

        $('.scroll-wrapper-item').addClass('is-scrolling')

        var posts = $('.work-item');
        posts.each(function(index) {
            var offset = this.getBoundingClientRect().top;
            if (offset < 0 && offset > -$(this).outerHeight()) {
                setBackgroundColor($(this), offset);
            }
        });
    });

    scroll.on('call', function(t, e, i) {
        if (t === 'lazyLoadImage') {
            if (!i.el.getAttribute('src')) {
                src = i.el.getAttribute('data-src');
                i.el.setAttribute('src', src);
            }
        }
    });
    var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    if (is_safari) {
        if (javascript_object.is_single === "1") {
            setTimeout(() => {
                scroll.update();
            }, 1000);
        }

        var rtime;
        var timeout = false;
        var delta = 200;
        $(window).on('resize', function() {
            rtime = new Date();
            if (timeout === false) {
                timeout = true;
                setTimeout(resizeend, delta);
            }
        });

        function resizeend() {
            if (new Date() - rtime < delta) {
                setTimeout(resizeend, delta);
            } else {
                timeout = false;
                setTimeout(() => {
                    scroll.update();
                }, 1000);
            }
        }
    }

    $('.footer-email a').addClass('not-default');
    // $("a").click(function(e) {
    //     if (!$(this).hasClass('not-default') && !$(this).hasClass('image-link') && performance.navigation.type != 2) {
    //         e.preventDefault();
    //         var url = $(e.currentTarget).attr('href');

    //         if ($(".main-menu-wrapper").hasClass("active")) {
    //             $('.main-menu-wrapper').removeClass('active');
    //             $('.main-menu-icon').removeClass('opened');
    //             $('body').removeClass('no-scroll');
    //             $('.menu-overlay').removeClass('active');
    //             setTimeout(() => {
    //                 $('#page').addClass('unloading');
    //                 setTimeout(() => {
    //                     window.location.href = url;
    //                 }, 600);
    //             }, 700);
    //         } else {
    //             $('#page').addClass('unloading');
    //             setTimeout(() => {
    //                 window.location.href = url;
    //             }, 600);
    //         }
    //     }
    // });
    $('#social-menu').find('a').addClass('not-default');
    $('#social-menu').find('a').attr('target', '_blank');

    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
        $('.svg-content-wrapper').addClass('not-fixed')
    }
    if (window.location.href.indexOf("/project/") > -1) {
        $('.menu-menu-1-container').find('.menu-item-193').addClass('current_page_item active-page');
    }
    // Lazy Load
    var $q = function(q, res) {
            if (document.querySelectorAll) {
                res = document.querySelectorAll(q);
            } else {
                var d = document,
                    a = d.styleSheets[0] || d.createStyleSheet();

                a.addRule(q, 'f:b');
                for (var l = d.all, b = 0, c = [], f = l.length; b < f; b++)
                    l[b].currentStyle.f && c.push(l[b]);

                a.removeRule(0);
                res = c;
            }
            return res;
        },
        addEventListener = function(evt, fn) {
            window.addEventListener ?
                this.addEventListener(evt, fn, false) :
                (window.attachEvent) ?
                this.attachEvent('on' + evt, fn) :
                this['on' + evt] = fn;
        },
        _has = function(obj, key) {
            return Object.prototype.hasOwnProperty.call(obj, key);
        };

    function loadImage(el, fn) {
        var img = new Image(),
            src = el.getAttribute('data-src');

        img.onload = function() {
            if (!!el.parent)
                el.parent.replaceChild(img, el)
            else
                el.src = src;

            fn ? fn() : null;
        }
        img.src = src;
    }

    function elementInViewport(el) {
        var rect = el.getBoundingClientRect()
        return (rect.top >= 0 && rect.left >= 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight))
    }

    var images = new Array(),
        query = $q('img.lazy'),
        processScroll = function() {
            for (var i = 0; i < images.length; i++) {
                if (elementInViewport(images[i])) {
                    loadImage(images[i], function() {
                        images.splice(i, i);
                    });
                }
            };
        };
    // Array.prototype.slice.call is not callable under our lovely IE8 
    for (var i = 0; i < query.length; i++) {
        images.push(query[i]);
    };

    processScroll();
    $(document.body).on('touchmove', processScroll);
    addEventListener('scroll', processScroll);


    var owl_workspace = $('.owl-workspace').owlCarousel({
        loop: true,
        margin: 50,
        responsiveClass: true,
        nav: false,
        dots: false,
        center: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 60,
                margin: 0,
            },
            769: {
                items: 2,
                stagePadding: 150,
            },
            1024: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    })

    $('.services-content').find('.content').hide();
    $(".content[data-key='0']").show();
    $(document).on('click', '.service-title-button', function() {
        if (!$(this).hasClass('active')) {
            $('.services-title').find('.title').removeClass('active');
            $(this).addClass('active');
            let key = $(this).attr('data-key');

            let content = $(".content[data-key='" + key + "']");
            $('.services-content').find('.content').removeClass('active');
            setTimeout(() => {
                $('.services-content').find('.content').hide();
                $(content).show();
                $(content).addClass('active');
            }, 200);
        }
    });

    $(document).on('click', '.owl-navigator-prev', function() {
        owl_workspace.trigger('prev.owl.carousel');
    });

    $(document).on('click', '.owl-navigator-next', function() {
        owl_workspace.trigger('next.owl.carousel');
    });

    var owl_team = $('.owl-team').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            769: {
                dotsEach: 1,
                items: 2.5,
                margin: 10
            },
            1024: {
                dotsEach: 1,
                items: 3.5,
                margin: 20,
            },
            1300: {
                dotsEach: 1,
                items: 4.5,
                margin: 30,
            }
        }
    });

    var counterMenu = 0;
    $('.main-menu-wrapper .main-menu-content #primary-menu li').each(function() {
        counterMenu++;
        $(this).append("<div class='menu-wrapper--border'><div class='menu-inner--border'><div class='menu-before--border'><svg><path d='M 87 1 A 86 86 0 1 1 86.9 1' stroke='black' stroke-width='0.5' fill='none'></svg> </div><div class='menu-after--border'><svg><path d='M 87 1 A 86 86 0 1 1 86.9 1' stroke='black' stroke-width='0.5' fill='none'></svg></div></div></div>");
        $(this).prepend(counterMenu < 10 ? "<span class='count'>0" + counterMenu + "</span>" : "<span class='count'>" + counterMenu + "</span>");
    });

    $('.footer-menu a').each(function() {
        if ($(this).attr('href') == '#') {
            $(this).contents().unwrap();
        } else {
            $(this).attr('target', '_blank');
        }
    })

    $(document).on('click', '.main-menu', function() {
        $('.main-menu-wrapper').toggleClass('active')
        $('.main-menu-icon').toggleClass('opened')
        $('body').toggleClass('no-scroll')
        $('.menu-overlay').toggleClass('active')

        if ($(".main-menu-wrapper").hasClass("active")) {
            $('.main-logo svg path').css({ fill: '#141414' });
            $('.main-menu-icon span').css({ background: '#141414' });
            $('.menu-menu-1-container').find('.current_page_item').addClass('active-page');
            setTimeout(() => {
                scroll.stop();
            }, 1000);
        } else {
            setTimeout(() => {
                scroll.start();
            }, 1000);
        }
    })

    $(document).mouseup(function(e) {
        var container = $(".main-menu-content");
        var menuicon = $(".main-menu");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !menuicon.is(e.target) && menuicon.has(e.target).length === 0) {
            if ($(".main-menu-wrapper").hasClass("active")) {
                $('.main-menu-wrapper').toggleClass('active')
                $('.main-menu-icon').toggleClass('opened')
                $('body').toggleClass('no-scroll')
                $('.menu-overlay').toggleClass('active')
                setTimeout(() => {
                    scroll.start();
                }, 1000);
            }
        }
    });

    $(document).on('click', '.see-more-button', function() {
        $('.more-p').slideToggle(600, 'swing');
        $('.see-more-button').toggleClass('see-less')
    });

    var gallery_swiper = new Swiper(".gallery-slider", {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1.7,
        loop: true,
        spaceBetween: 10,
        breakpoints: {
            500: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
            1300: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
            1500: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1800: {
                slidesPerView: 4,
                spaceBetween: 70,
            },
        },
    });

    var xPrev = 0;
    var direction = '';
    mouseIsDown = false;

    function setDirection(e) {
        if (mouseIsDown === false)
            return;
        xPrev < e.pageX ? direction = "right" : direction = "left";
        xPrev = e.pageX;
    }

    function initSwipeEvent(e) {
        if (mouseIsDown == true) {
            if (direction == 'right') {
                gallery_swiper.slidePrev();
            } else {
                gallery_swiper.slideNext();
            }
        }
        mouseIsDown = false;
    }

    $('.iphone-overlay').on('mousedown', function() { mouseIsDown = true; });
    $('.iphone-overlay').on('mousemove', setDirection);
    $('.iphone-overlay').on('mouseout', initSwipeEvent);
    document.addEventListener('touchstart', handleTouchStart, false);
    document.addEventListener('touchmove', handleTouchMove, false);
    var xDown = null;
    var yDown = null;

    function getTouches(e) {
        return e.touches || e.originalEvent.touches;
    }

    function handleTouchStart(e) {
        const firstTouch = getTouches(e)[0];
        xDown = firstTouch.clientX;
        yDown = firstTouch.clientY;
    };

    function handleTouchMove(e) {
        if (!xDown || !yDown) {
            return;
        }
        var xUp = e.touches[0].clientX;
        var yUp = e.touches[0].clientY;
        var xDiff = xDown - xUp;
        var yDiff = yDown - yUp;
        var phoneLayer = $('.iphone-overlay');

        if (Math.abs(xDiff) > Math.abs(yDiff) && phoneLayer.is(e.target)) {
            if (xDiff > 0) {
                gallery_swiper.slideNext();
            } else {
                gallery_swiper.slidePrev();
            }
        }
        xDown = null;
        yDown = null;
    };

    $('.owl-colors').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        center: false,
        responsive: {
            0: {
                items: 3.5
            },
            769: {
                items: 2
            },
            1200: {
                items: 4
            }
        }
    });
    $('.owl-colors .owl-stage .active:first').addClass('first');
    $('.owl-colors .owl-stage .active').eq(1).addClass('second');
    $('.owl-colors .owl-stage .active').eq(2).addClass('third');
    $('.owl-colors .owl-stage .active:last').addClass('fourth');

    ifIsTouch = false;
    if ("ontouchstart" in document.documentElement) {
        ifIsTouch = true;
    } else {
        ifIsTouch = false;
    }

    $(document).on('click', '.video-player', function(e) {
        e.preventDefault();
        var video_id = $(this).attr('data-id');
        var parent = $(this).parent(".video-player-inner-wrapper");

        var player_wrapper = parent.find('.player-wrapper');
        var url = 'https://player.vimeo.com/video/' + video_id + '?autoplay=1&background=1';
        var iframe = '<iframe src=' + url + ' allow="autoplay" scrolling="yes"></iframe>';
        player_wrapper.html(iframe);
        $(this).addClass('d-none');
        setTimeout(() => {
            var iframe_append = parent.find('iframe')[0];
            var player = $f(iframe_append);
            player.addEvent('ready', function() {
                player.api('play');
                parent.find('.player-wrapper').addClass('active');
                parent.find('.player-controller').addClass('active');
                parent.find('.video-pause').removeClass('d-none');
                $('.video-player-inner-wrapper').parent().parent().css('background', 'black');
            });
            if (iOS()) {
                parent.find('.player-volume-mute').addClass('d-none');
                parent.find('.player-volume-unmute').removeClass('d-none');
                player.addEvent('ready', function() {
                    player.api('setVolume', 0);
                });
                player.api('play');
                $('.video-player-inner-wrapper').parent().parent().css('background', 'black');
            }
        }, 2000);
        if (!ifIsTouch) {
            setTimeout(() => {
                var items = parent.find('.video-active');
                items.each(function() {
                    $(this).css({ 'opacity': 0 });
                });
            }, 4000);
        }
    });

    function iOS() {
        return [
                'iPad Simulator',
                'iPhone Simulator',
                'iPod Simulator',
                'iPad',
                'iPhone',
                'iPod'
            ].includes(navigator.platform)
            // iPad on iOS 13 detection
            ||
            (navigator.userAgent.includes("Mac") && "ontouchend" in document)
    }


    $(document).on('click', '.video-pause', function() {
        var parent = $(this).parent(".video-player-inner-wrapper");
        var iframe = parent.find('iframe')[0];
        var player = $f(iframe);
        player.addEvent('ready', function() {
            player.api('pause');
        });
        $(this).addClass('d-none');
        parent.find('.video-play').removeClass('d-none');
    });

    $(document).on('click', '.video-play', function() {
        var parent = $(this).parent(".video-player-inner-wrapper");
        var iframe = parent.find('iframe')[0];
        $(this).addClass('d-none');
        var player = $f(iframe);
        setTimeout(() => {
            var items = parent.find('.video-active');
            items.each(function() {
                $(this).css({ 'opacity': 0 });
            });
        }, 4000);
        player.addEvent('ready', function() {
            player.api('play');
        });
        parent.find('.video-pause').removeClass('d-none');
    });

    $(document).on('mousemove', '.video-player-inner-wrapper', function() {

        if (!ifIsTouch && !$(this).hasClass('autoplaying')) {
            var j;
            var items = $(this).find('.video-active');
            items.each(function() {
                if ($(this).css('opacity') == '0') {
                    $(this).css({ 'opacity': 1 });
                }
            });
            j = setTimeout(() => {
                items.each(function() {
                    if ($(this).css('opacity') == '1') {
                        $(this).css({ 'opacity': 0 });
                    }
                });
            }, 4000);
        }
    });

    $(document).on('click', '.masonry-wrapper > .brick > a, .mosaic-section-wrapper > .mosaic-item > a', function() {
        if ($(window).width() > 768) {
            $('.slick-next').html(`<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="white" fill-opacity="0.2"/>
            <path d="M24 40L37 29.5L24 19" stroke="white" stroke-width="1.725" stroke-linecap="round"/>
            </svg>`)

            $('.slick-prev').html(`<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="30" fill="white" fill-opacity="0.2"/>
            <path d="M36 20L23 30.5L36 41" stroke="white" stroke-width="1.725" stroke-linecap="round"/>
            </svg>`)
        } else {
            $('.slick-next').html(`<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="white" fill-opacity="0.65"/>
            <path d="M16 27L24 20L16 13" stroke="#626262" stroke-linecap="round"/>
            </svg>`)

            $('.slick-prev').html(`<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="white" fill-opacity="0.65"/>
            <path d="M24 13L16 20L24 27" stroke="#626262" stroke-linecap="round"/>
            </svg>`)
        }
    });

    var masonryOwl = $('.masonry-slider');
    owlOptions = {
        loop: true,
        items: 1,
        nav: false
    };
    if ($(window).width() <= 768) {
        masonryOwl.addClass('owl-carousel owl-theme');
        masonryOwl.owlCarousel(owlOptions);
    } else {
        masonryOwl.addClass('off');
        masonryOwl.removeClass('owl-carousel owl-theme');
    }

    $('.quickview-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        items: 1
    });

    $(document).on('click', '.mobile-active-category', function() {
        $('.categories-links').toggleClass('active');
        $('.svg').toggleClass('active');
    })
    $(document).on('click', '.cat-link', function() {
        $('.active-cat').html($(this).text())
        if ($('.categories-links').hasClass('active')) {
            $('.categories-links').removeClass('active');
            $('.svg').removeClass('active');
        }
    })
    $(document).mouseup(function(e) {
        var container = $(".mobile-active-category");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($(".categories-links").hasClass("active")) {
                $('.categories-links').removeClass('active');
                $('.svg').removeClass('active');
            }
        }
    });

    $(".next-project-link").on({
        mouseenter: function() {
            $('.project-overlay').addClass('hovered');
        },
        mouseleave: function() {
            $('.project-overlay').removeClass('hovered');
        }
    });

    $('#primary-menu li').mousemove(function(event) {

        $('#primary-menu li').removeClass('active-page');
        $('#primary-menu li').not($(this)).find('.menu-before--border').css("transform", "none");
        $('#primary-menu li').not($(this)).find('.menu-after--border').css("transform", "none");
        $('#primary-menu li').not($(this)).find('.menu-inner--border').css("transform", "none");

        var objLeft = $(this).offset().left;
        var objTop = $(this).offset().top;
        var objCenterX = objLeft + 160 / 2;
        var objCenterY = objTop + $(this).height() / 2;
        var posTop = (((event.pageY / objCenterY).toFixed(2) * 100) - 80) / 2;
        var posLeft = (((event.pageX / objCenterX).toFixed(2) * 100) - 100) / 1.4;

        if (posLeft > 20) {
            posLeft = 20;
        } else if (posLeft < -20) {
            posLeft = -20;
        }
        if (posTop > 40) {
            posTop = 40;
        }

        $(this).find('.menu-before--border').css("transform", "translate(" + (posLeft) + "px" + ", " + (posTop) + "px" + ")");
        $(this).find('.menu-before--border').css("-webkit-transform", "translate(" + (posLeft) + "px" + ", " + (posTop) + "px" + ")");
        $(this).find('.menu-after--border').css("transform", "translate(" + ((posLeft * -1) * 0.1) + "px" + ", " + ((posTop * -1) * 0.1) + "px" + ")");
        $(this).find('.menu-after--border').css("-webkit-transform", "translate(" + ((posLeft * -1) * 0.1) + "px" + ", " + ((posTop * -1) * 0.1) + "px" + ")");

        $(this).find('.menu-inner--border').css("transform", "translate(" + (posLeft) + "%" + ", " + (posTop) + "%" + ")");

    });

    $(document).one('click', '#primary-menu.menu li', function(e) {
        e.preventDefault();
        $(this).find('img').trigger('click');
    });

    // GO TO TOP FUNCTION
    $(document).on('click', '.go-to-top-button', function(e) {
        e.preventDefault();
        scroll.scrollTo('top', {
            'offset': 0,
            'duration': 800,
            'easing': [0.12, 0.41, 0.11, 0.9],
            'disableLerp': false
        });
    });

    // FLIP ELEMENTS INSIDE SECTION
    if ($('.flip').length) {
        $('.flip').each(function() {
            let lastEl = $(this).find('.col-12').last();
            $(lastEl).prependTo(this);
        })
    }
});


var lastScrollTop = 0;
var counter = 200;
$(window).on('scroll', function(e) {
    if (window.innerWidth < 768) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop || st < 500) {
            $('.main-menu-fixed, .main-logo-fixed').removeClass('fixed-m')
            if ($('.content-parallax-mobile').hasClass('is-inview')) {
                counter -= 1;
                set_parallax(counter);
            } else {
                counter = 200;
                set_parallax(counter);
            }
        } else {
            $('.main-menu-fixed, .main-logo-fixed').addClass('fixed-m')
            if ($('.content-parallax-mobile').hasClass('is-inview')) {
                counter += 1;
                set_parallax(counter);
            } else {
                counter = 200;
                set_parallax(counter);
            }
        }
        lastScrollTop = st;
    }
});

$(window).on('resize', function() {

    var work_items = $('.work-item');
    work_items.each(function(index) {
        var parent_height = $(this).find('.content-inner-wrapper').height();
        var child_height = $(this).find('.content-inner-wrapper-holder').height();
        var set_padding = parent_height / 2 - child_height / 2 + 'px';
        $(this).find('.content-inner-wrapper').css({ 'padding-top': set_padding });
    })

    var masonryOwl = $('.masonry-slider');
    if ($(window).width() <= 768) {
        if (masonryOwl.hasClass('off')) {
            masonryOwl.owlCarousel(owlOptions);
            masonryOwl.removeClass('off');
            masonryOwl.addClass('owl-carousel owl-theme')
        }
    } else {
        if (!masonryOwl.hasClass('off')) {
            masonryOwl.addClass('off').trigger('destroy.owl.carousel');
            masonryOwl.removeClass('owl-carousel owl-theme');
            masonryOwl.find('.owl-stage-outer').children(':eq(0)').unwrap();
        }
    }

});

/*  FUNCTIONS  */

function init_animation() {
    const home_sentence = document.querySelector('#home-sentence');
    if (home_sentence) {
        const home_sentence_visible = isInViewport(home_sentence, window.innerHeight / 2);
        if (home_sentence_visible) {
            var element = home_sentence;
            sentenceAnimation(element);
        }
    }
}

//Viewport Detect
function isInViewport(el, active_top) {
    elment_top = Math.abs(el.getBoundingClientRect().top);
    return (
        elment_top < active_top
    );
}

//Characters Animation
function triggerCharacters(sentence) {
    var spanCounter = 0;
    var spanDelay = 75;
    const spans = sentence.getElementsByTagName('span');
    for (let index = 0; index < spans.length; index++) {
        setTimeout(function() {
            const span = spans[index];
            span.classList.add('active');
        }, (spanCounter * spanDelay));
        spanCounter++;
    }
}

// Sentence Animate and Add Class Loaded to element on viewport
function sentenceAnimation($this) {
    var sentences = $this.getElementsByClassName("sentence");
    for (let index = 0; index < sentences.length; index++) {
        const sentence = sentences[index];
        triggerCharacters(sentence);
        if (sentences.length - 1 === index) {
            setTimeout(() => {
                $this.classList.add('loaded');
            }, 1000);
        }
    }
}

function set_parallax(counter) {
    if (counter > 0 && counter < 350) {
        var element_transform = $('.parallax-wrapper-image');
        new TweenMax(element_transform, 1, { top: -counter + 'px', ease: Expo.InOut, overwrite: 'all' });
    }
}

function set_home_text_animation() {
    var we_are_section = document.getElementById('we-are-section');
    if (we_are_section) {
        const we_are_section_viewport = isInViewport(we_are_section, window.innerHeight);
        if (we_are_section_viewport) {
            document.getElementById('we-are-section').classList.add('fade-in');
        }
    }
}

function loadedImage(element) {
    element.classList.add('loaded');
}

function setBackgroundColor(element, offset) {
    const percentage = Math.abs((offset / (element.outerHeight())));
    if (percentage <= 1) {
        const from_color = hexToRgb(element.attr('data-background'));
        const to_color = hexToRgb(element.next('.work-item').attr('data-background'));
        if (from_color && to_color) {
            const from_to_color_r = from_color.r - to_color.r;
            const new_r = from_color.r - (from_to_color_r * percentage);
            const from_to_color_g = from_color.g - to_color.g;
            const new_g = from_color.g - (from_to_color_g * percentage);
            const from_to_color_b = from_color.b - to_color.b;
            const new_b = from_color.b - (from_to_color_b * percentage);
            $('#inner-background').css("background-color", "rgb(" + new_r + "," + new_g + "," + new_b + ")");
            const brightness = ifIsLightOrDark(new_r, new_g, new_b);
            if ($(".main-menu-wrapper").hasClass("active")) {
                $('.main-logo svg path').css({ fill: '#141414' });
                $('.main-menu-icon span').css({ background: '#141414' });
            } else {
                $('.main-logo svg path').css({ fill: brightness });
                $('.main-menu-icon span').css({ background: brightness });
            }
        }
    }
}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function ifIsLightOrDark(r, g, b) {
    var hsp = 0.2126 * r + 0.7152 * g + 0.0722 * b;
    if (hsp > 130) {
        return '#141414';
    } else {
        return '#fff';
    }
}

function isOnScreen(elem) {
    if (elem.length == 0) {
        return;
    }
    var $window = jQuery(window)
    var viewport_top = $window.scrollTop()
    var viewport_height = $window.height()
    var viewport_bottom = viewport_top + viewport_height
    var $elem = jQuery(elem)
    var top = $elem.offset().top
    var height = $elem.height()
    var bottom = top + height

    return (top >= viewport_top && top < viewport_bottom) ||
        (bottom > viewport_top && bottom <= viewport_bottom) ||
        (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
}

var mac = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);

if (mac) {
    $('body').addClass('safari-mac');
} else {
    $('body').removeClass('safari-mac');
}

$(function() { // Wait for page to finish loading.
    if (navigator != undefined && navigator.userAgent != undefined) {
        user_agent = navigator.userAgent.toLowerCase();
        if (user_agent.indexOf('android') > -1) { // Is Android.
            $(document.body).addClass('android');
        }
    }
});