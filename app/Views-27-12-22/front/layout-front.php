<?php
$pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?=$head?>
</head>
<body>
    <header class="home-new">
        <?=$header?>
    </header>
    <main class="home-new">
        <?=$maincontent?>
    </main>
    <footer class="home-new">
        <?=$footer?>
    </footer>
    <script src="<?=base_url('/material/front/')?>/assets/js/jquery-3.4.1.min.js?c=-62170003270" type="text/javascript"
        charset="utf-8"></script>
    <script src="<?=base_url('/material/front/')?>/assets/js/bootstrap.min.js?c=-62170003270" type="text/javascript"
        defer charset="utf-8"></script>
    <script src="<?=base_url('/material/front/')?>/assets/js/slick.js?c=-62170003270" type="text/javascript" defer
        charset="utf-8"></script>
    <script>
        //home slider
        $(document).ready(function () {
            // $('.home-slider').slick();
            $('.speakers-carousel').slick({
                lazyLoad: 'ondemand',
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                // variableWidth: true
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 375,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            })
            $('.sponser-carousel, .home-banner-slider').slick({
                lazyLoad: 'ondemand',
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 7000,
            })
            
        })
    </script>
    <script>
        // Toggle Sub Nav
        $("nav.navbar li:has(ul)").children("ul").hide(); // hide the li UL
        $("nav.navbar li:has(ul)").append('<button class="ceret"><i class="fa fa-angle-down" aria-hidden="true"></i></button>');
        $("nav.navbar li:has(ul)").find("button").click(function () {
            // Add .show-subnav class to revele on click
            var parent = $(this).parent()
            parent.siblings().find("ul.show-subnav").removeClass("show-subnav");
            parent.find("ul:first").toggleClass("show-subnav");
            // how to hide previously clicked submenus?
        });
        // Slide navbar from right
        $('[data-toggle="slide-collapse"]').on('click', function () {
            $navMenuCont = $($(this).data('target'));
            // $navMenuCont.animate({'width':'toggle'}, 350);
            $navMenuCont.toggleClass('in');
            $(".menu-overlay").fadeIn(500);
        });
        // navbar close on out side click
        $(".menu-overlay, .navbar-close").click(function (event) {
            $(".navbar-toggle").trigger("click");
            $(".menu-overlay").fadeOut(500);
        });
    </script>
    <script>
        $('#player').html('<iframe type="text/html" src="https://www.youtube.com/embed/' + $('.carousel__wrap ul li.active').children('.video-thumb').attr('data-video') + '" allowfullscreen frameborder="0"></iframe>')
        $('.carousel__wrap ul li').click(function () {
            $('.carousel__wrap ul li').removeClass('active');
            $(this).addClass('active');
            $('#player').html('<iframe type="text/html" src="https://www.youtube.com/embed/' + $(this).children('.video-thumb').attr('data-video') + '" allowfullscreen frameborder="0"></iframe>');
            return false;
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var iframe = $(e.relatedTarget.hash).find('iframe');
            var src = iframe.attr('src');
            iframe.attr('src', '');
            iframe.attr('src', src);
        });

        $('.video-thumb-click').click(function(){
            $(this).html('<iframe type="text/html" src="https://www.youtube.com/embed/' + $(this).attr('data-video') + '" allowfullscreen frameborder="0"></iframe>');
        })

    </script>
    <script>
        // this "lazy" getter for playerImg will either return or create the img
        function playerImg() {
            let playerImg = document.getElementById('playerimg');
            if (!playerImg) {
                playerImg = document.createElement('img');
                playerImg.id = 'playerimg';
                document.getElementById('playerbox').appendChild(playerImg);
            }
            return playerImg;
        }
        // set the source attribute of the playerImg
        function setPlayerImg(src) {
            playerImg().setAttribute('src', src);
        }
        // get the rock, paper, scissors elements with their common class
        const imgs = document.getElementsByClassName("home-img-gallery");
        // for each, add a click handler that calls our src setting function
        for (let i = 0; i < imgs.length; i++) {
            const el = imgs[i];
            el.addEventListener('click', () => setPlayerImg(el.src), false);
        }
        $('.img-gallery-thumb li').click(function () {
            $('.img-gallery-thumb li').removeClass('active');
            $(this).addClass('active');
        })
        $('.nav-tabs').click(function (e) {
            if ($('#playerbox').is(':empty')) {
                setPlayerImg(imgs[0].src);
            }
        })
    </script>
    <script>
        function checkWidth() {
            var windowSize = $(window).width();
            if (windowSize <= 991) {
                //console.log('window size ', windowSize);
                $('.quick-nav').appendTo($('#home-new-navbar-collapse'));
            } else {
                $('.quick-nav').insertBefore($('.navbar-toggle'));
            }
        }
        $(document).ready(checkWidth);
        $(window).resize(checkWidth);
        $('#spanYear').html(new Date().getFullYear());
        $(".scroll").click(function (event) {
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                dest = $(document).height() - $(window).height();
            } else {
                dest = $(this.hash).offset().top;
            }
            //go to destination
            $('html,body').animate({
                scrollTop: dest
            }, 1000, 'swing');
        });
    </script>
    <script>
        $('.wishList').on('click', function(){
            $(this).addClass('active');
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?=base_url('/material/front/')?>/assets/jquery.loading.js"></script>
    <script src="<?=base_url('/material/front/')?>/assets/sweetalert2.all.min.js"></script>
    <script src="<?=base_url('/material/front/')?>/assets/common-function.js"></script>
    <script src="<?=base_url('/material/front/')?>/assets/india-infocom.js"></script>
    <script src="<?=base_url('/material/front/')?>/assets/js/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script type="text/javascript" src="<?=base_url('material/front/')?>/assets/jquery.captcha.basic.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {        
            $('.my-contactForm').captcha();
        });
    </script>
    <script type="text/javascript">
        //Pagination
        pageName = '<?=$pageName?>';
        if(pageName == 'video-gallery'){
            pageSize = 6;
        } else {
            pageSize = 8;
        }        
        incremSlide = 10;
        startPage = 0;
        numberPage = 0;

        var pageCount =  $(".line-content").length / pageSize;
        var totalSlidepPage = Math.floor(pageCount / incremSlide);
            
        for(var i = 0 ; i<pageCount;i++){
            $("#pagin").append('<li class="page-item"><a class="page-link" href="javascript:void(0);">'+(i+1)+'</a></li> ');
            if(i>pageSize){
                $("#pagin li").eq(i).hide();
            }
        }
        //var prevIcon = '<a class="page-link" href="#" aria-label="Previous"><i class="zmdi zmdi-chevron-left"></i></a>';
        var prevIcon = '<i class="zmdi zmdi-chevron-left"></i>';
        var prev = $("<li/>").addClass("prev page-item").html(prevIcon).click(function(){
            startPage-=10;
            incremSlide-=10;
            numberPage--;
            slide();
        });

        prev.hide();

        //var nextIcon = '<a class="page-link" href="#" aria-label="Next"><i class="zmdi zmdi-chevron-right"></i></a>';
        var nextIcon = '<i class="zmdi zmdi-chevron-right"></i>';
        var next = $("<li/>").addClass("next page-item").html(nextIcon).click(function(){
            startPage+=10;
            incremSlide+=10;
            numberPage++;
            slide();
        });
        next.hide();
        
        $("#pagin").prepend(prev).append(next);

        $("#pagin li").first().find("a").addClass("active");

        slide = function(sens){
            $("#pagin li").hide();
            
            for(t=startPage;t<incremSlide;t++){
                $("#pagin li").eq(t+1).show();
            }
            if(startPage == 0){
                next.show();
                prev.hide();
            }else if(numberPage == totalSlidepPage ){
                next.hide();
                prev.show();
            }else{
                next.show();
                prev.show();
            }
        }

        showPage = function(page) {
                $(".line-content").hide();
                $(".line-content").each(function(n) {
                    if (n >= pageSize * (page - 1) && n < pageSize * page)
                        $(this).show();
                });        
        }
            
        showPage(1);
        $("#pagin li a").eq(0).addClass("active");

        $("#pagin li a").click(function() {
                $("#pagin li a").removeClass("active");
                $(this).addClass("active");
                showPage(parseInt($(this).text()));
        });
    </script>

    <script type="text/javascript">
      $( document ).ready(function() {        
        $("body").on('click', '.toggle-password', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#regPassword");
          if (input.attr("type") === "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }          
        });
        $("body").on('click', '.toggle-password2', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#regCnfPassword");
          if (input.attr("type") === "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }          
        });
        $("body").on('click', '.toggle-password3', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#new_password");
          if (input.attr("type") === "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }          
        });
        $("body").on('click', '.toggle-password4', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#confirm_password");
          if (input.attr("type") === "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }          
        });
      });
    </script>
</body>
</html>