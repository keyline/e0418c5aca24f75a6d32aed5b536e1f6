/* Whole-script strict mode syntax */
"use strict";
$(function () {

    $('a[data-modal]').on('click', function () {
        $($(this).data('modal')).modal();
        return false;
    });

    $(document).on('click', 'button#disconnect', function () {
        let user = { user: $(this).data('wantlogout') };
        handleLogOut(user).then(function (response) {
            //handle ui
            // convert to JQuery object
            const logoutdata = JSON.parse(response);
            afterLoggedinUIHandle(logoutdata);
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.headertop_part').addClass("sticky_header");
        }
        else {
            $('.headertop_part').removeClass("sticky_header");
        }
    });

    let owl2 = $('.owl-homeliveleft');
    $('.owl-homeliveleft').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        }
    });
    let owl3 = $('.owl-homeupcoming');
    $('.owl-homeupcoming').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        }
    });

    $('.weeksday_all').owlCarousel({
        loop: true,
        margin: 2,
        responsiveClass: true,
        autoplayHoverPause: false,
        autoplay: false,
        dots: false,
        nav: false,
        slideSpeed: 400,
        paginationSpeed: 400,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 2.5,
            },
            480: {
                items: 2.5,
            },
            600: {
                items: 3.5,
            },
            950: {
                items: 4.5,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 6,
            }
        }
    });

    $(".weeksday_all").owlCarousel({
        items: 6
    });
    $('.link').on('click', function (event) {
        var $this = jQuery(this);
        if ($this.hasClass('clicked')) {
            $this.removeAttr('style').removeClass('clicked');
        } else {
            $this.css('background', '#E0411B').addClass('clicked');
        }
    });

    $('.link').on('click', function (event) {
        var $this = $(this);
        if ($this.hasClass('clicked')) {
            $this.removeAttr('style').removeClass('clicked');
        } else {
            $this.css('background', '#E0411B').addClass('clicked');
        }
    });

    $(".content").slice(0, 4).show();
    $("#loadMore").on("click", function (e) {
        e.preventDefault();
        $(".content:hidden").slice(0, 4).slideDown();
        if ($(".content:hidden").length == 0) {
            //   $("#loadMore").text("No Podcast Available").addClass("noContent");
            $("#loadMore").hide();
        }
    });

});