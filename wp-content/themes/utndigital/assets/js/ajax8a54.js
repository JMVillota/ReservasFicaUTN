let scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
});

$(window).on('load', function() {
    scroll.update();
    var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    if (is_safari) {
        setTimeout(() => {
            scroll.update();
        }, 1000);
    }
});

var fullLoaded = false;
$(document).ready(function() {
    scroll.update();
    fadeInPosts();
    var paged = 2;
    var cat_name;
    var ajax_call = false;

    function loadMoreAjax() {
        var scrollPosition = self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
        var data = {
            'action': 'loadMorePosts',
            'paged': paged
        };
        $.ajax({
            'type': 'POST',
            url: ajax_object.ajaxurl,
            data: data,
            success: function(data) {
                if (data.trim() !== 'Empty') {
                    paged++;
                    var max = $('.content-blog-posts').attr('data-max-page');
                    if (max <= paged) {
                        fullLoaded = true;
                    }
                    $('#posts-wrapper').append(data);
                    window.scrollTo(0, scrollPosition);
                    scroll.update();
                    fadeInPosts();
                    if ($('#posts-wrapper .col-lg-4').length < 9) {
                        $('.load-more-posts').addClass('disabled');
                    } else {
                        $('.load-more-posts').removeClass('disabled');
                    }
                    ajax_call = false;
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    var catPaged = 1;

    function loadPostsWithCat(cat_name) {
        var data = {
            'action': 'loadPostsWithCat',
            'paged': catPaged,
            'cat_name': cat_name
        };
        $.ajax({
            'type': 'POST',
            url: ajax_object.ajaxurl,
            data: data,
            success: function(data) {
                if (data.trim() !== 'Empty') {
                    catPaged++;
                    $('#posts-wrapper').append(data);
                    scroll.update();
                    fadeInPosts();
                    if ($('#posts-wrapper .col-lg-4').length < 9) {
                        $('.load-more-posts').addClass('disabled');
                    } else {
                        $('.load-more-posts').removeClass('disabled');
                    }
                    ajax_call = false;
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    var clickedButton = false;
    var clickedCat = false;
    $(document).on('click', '.load-more-posts', function(e) {
        e.preventDefault();
        $('.load-more-posts').addClass('fade-out');
        clickedButton = true;
        if (clickedCat) {
            loadPostsWithCat(cat_name);
        } else {
            loadMoreAjax();
        }
    });

    scroll.on('scroll', function(args) {
        if ($('.content-blog-posts').length !== 0) {
            if (-$('.content-blog-posts').offset().top + window.innerHeight > $(document).height() - 450 && clickedButton ||
                $(window).scrollTop() + $(window).height() > $(document).height() - 600 && clickedButton) {
                if (!ajax_call) {
                    ajax_call = true;
                    if (clickedCat) {
                        loadPostsWithCat(cat_name);
                    } else {
                        loadMoreAjax();
                    }
                }
            }
        }
    });

    $(document).on('click', '.cat-link', function(e) {
        e.preventDefault();
        fadeOutPosts();
        setTimeout(() => {
            $('#posts-wrapper').empty();
            $('.load-more-posts').removeClass('fade-out');
            $('.cat-link').removeClass('active');
            $(this).addClass('active');
            catPaged = 1;
            clickedButton = false;
            cat_name = $(this).text();
            var queryParams = new URLSearchParams(window.location.search);
            queryParams.set("filter", cat_name.toLowerCase());

            if (cat_name == 'All') {
                var url = window.location.href;
                var urlI = url.indexOf("?");
                var urlS = url.substring(urlI);
                var urlFiltered = url.replace(urlS, "");
                history.replaceState(null, null, urlFiltered);
            } else {
                history.replaceState(null, null, "?" + queryParams.toString());
            }

            if (cat_name != 'All') {
                clickedCat = true;
                loadPostsWithCat(cat_name);
            } else {
                clickedCat = false;
                paged = 1;
                loadMoreAjax();
            }
        }, 300);
    });

    $(document).ajaxStart(function() {
        if (fullLoaded == false) {
            $('.post-loader-wrapper').addClass('active');
        }
    });
    $(document).ajaxComplete(function() {
        $('.post-loader-wrapper').removeClass('active');
    });
});

function fadeInPosts() {
    $(".post-wrapper").each(function(index) {
        $(this).delay(200 * (index % 9)).queue(function(next) {
            $(this).addClass('fade-in');
            next();
        });
    });
}

function fadeOutPosts() {
    $(".post-wrapper").removeClass('fade-in')
}