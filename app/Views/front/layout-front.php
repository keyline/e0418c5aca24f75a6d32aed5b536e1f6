<?php
$pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?=$head?>
        <style>
            .option{
                font-size: 20px;
                margin-right: 15px
            }
            .option input{
                margin-right: 5px
            }
            .quiz-submit-div{
                border: 1px solid white;
                border-radius: 3px;
                width: 30%;
                color: #FAF032;
                font-weight: bold;
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: center;
                overflow: hidden;
                position: relative;
                font-family: 'Quicksand';
                margin-right: 20px;
                margin-top: 20px;
            }
            .quiz-result-div{
                border: 1px solid white;
                border-radius: 3px;
                width: 30%;
                color: #FAF032;
                font-weight: bold;
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: center;
                overflow: hidden;
                position: relative;
                font-family: 'Quicksand';
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="loadingio-spinner-pulse-4ofwcox9r54" style="display:none;">
            <div class="ldio-0lvymc0w5sdn">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <header>
            <?=$header?>
        </header>
        <div id="pageContent">
            <?=$maincontent?>
        </div>
        <div id="myElement"></div>        
        <!-- <script src="https://accounts.google.com/gsi/client" async defer></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>  
        <!-- in localhost it may generate error better comment it -->
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <?php if (empty($_GET['page'])) { ?>
        <!-- test account player js     -->
        <!-- <script type="text/javascript" src="<?=$ASSETS_URL?>jwplayer/4Q2lEcj7.js"></script> -->
         <!-- live account player js     -->
        <script src="https://cdn.jwplayer.com/libraries/c1QdRr9B.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>redirect-ajax.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>owl-min.js"></script>
        <script>
            $(function() {
                $('a[data-modal]').on('click', function() {
                $($(this).data('modal')).modal();
                return false;
                });

                $(document).on('click', 'button#disconnect',function(){
                    let user= {user: $(this).data('wantlogout')};
                    handleLogOut(user).then(function(response){
                        //handle ui
                        // convert to JQuery object
                        const logoutdata = JSON.parse(response);
                        afterLoggedinUIHandle(logoutdata);
                    });
                });
            });
        </script>
        <script type="text/javascript">
            
            $(window).scroll(function() 
                {
                    if ($(this).scrollTop() > 1)
                {
                    $('.headertop_part').addClass("sticky_header");
                }
                else
                {
                    $('.headertop_part').removeClass("sticky_header");
                }
            });
        </script>
        <script type="text/javascript">
            let owl2 = $('.owl-homeliveleft');
            $('.owl-homeliveleft').owlCarousel({
                loop: true,
                nav: false,
        		autoplay:true,
        		autoplayHoverPause:true,
                dots:false,
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
        		autoplay:true,
        		autoplayHoverPause:true,
                dots:false,
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
                        items: 2,
                    },
                    480: {
                        items: 3,
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
            })
            jQuery(document).ready(function() { 
                jQuery(".weeksday_all").owlCarousel({
                    items : 6
                });
                jQuery('.link').on('click', function(event){
                    var $this = jQuery(this);
                    if($this.hasClass('clicked')){
                        $this.removeAttr('style').removeClass('clicked');
                    } else{
                        $this.css('background','#E0411B').addClass('clicked');
                    }
                });
            });

            jQuery('.link').on('click', function(event){
            var $this = jQuery(this);
            if($this.hasClass('clicked')){
                $this.removeAttr('style').removeClass('clicked');
            } else{
                $this.css('background','#E0411B').addClass('clicked');
            }
            });

        // Logout from facebook
        //<img src="<?php //echo base_url('assets/images/fblogin.png');?>"/>
        function fbLogout() {
            FB.logout(function() {
                document.getElementById('fbloginbutton').setAttribute("onclick","fbLogin()");
                document.getElementById('fbloginbutton').innerHTML = '<i class="fab fa-facebook-f"></i>';
                document.getElementById('userData').innerHTML = '';
                document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
                document.getElementById('user-img').src='<?=$ASSETS_URL?>images/man.jpg';
            });
        }
        

        //Saving google user
        function saveGoogleUserData(userData){
            $.ajaxSetup({
                headers: {
                    
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            return $.post("<?php echo base_url('Social_login/oauth2callback'); ?>",JSON.stringify({ oauth_provider:'Google', id_token: userData }),);

        }

        function handleCredentialResponse(response) {
          console.log("Encoded JWT ID token: " + response.credential);
          saveGoogleUserData(response.credential).then(function(handleSession){
                                
                // convert to JQuery object
                const sessionObj = JSON.parse(handleSession);
                afterLoggedinUIHandle(sessionObj);

          });
        
        }
        window.onload = function () {
          google.accounts.id.initialize({
            client_id: "890714183723-hhlf2hkq306qlo81vmbecigtsjrjcj7f.apps.googleusercontent.com",
            callback: handleCredentialResponse
          });
          google.accounts.id.renderButton(
            document.getElementById("gConnectBtn"),
            { theme: "outline", size: "medium" }  // customization attributes
          );
          google.accounts.id.prompt(); // also display the One Tap dialog
        }
            //facebook login
            window.fbAsyncInit = function() {
                // FB JavaScript SDK configuration and setup
                FB.init({
                  appId      : '564063147297627', // FB App ID
                  cookie     : true,  // enable cookies to allow the server to access the session
                  xfbml      : true,  // parse social plugins on this page
                  version    : 'v15.0' // use graph api version 2.10
                });
                
                // Check whether the user already logged in
                FB.getLoginStatus(function(response) {
                    if (response.status === 'connected') {
                        //display user data
                        getFbUserData();
                    }else{
                        //soft login modal
                        //$("#socialbtn-modal").modal();

                    }
                });
            };

            // Load the JavaScript SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            // Facebook login with JavaScript SDK
            function fbLogin() {
                FB.login(function (response) {
                    if (response.authResponse) {
                        // Get and display the user profile data
                        getFbUserData();
                    } else {
                        document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
                    }
                }, {scope: 'email'});
            }

            // Fetch the user profile data from facebook
            function getFbUserData(){
                FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,cover'},
                function (response) {
                    // document.getElementById('fbloginbutton').setAttribute("onclick","fbLogout()");
                    // document.getElementById('fbloginbutton').innerHTML = 'Logout from Facebook';
                    // document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
                    // document.getElementById('userData').innerHTML = '<div style="position: relative;"><img src="" /><img style="position: absolute; top: 90%; left: 25%;" src="'+response.picture.data.url+'"/></div><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Profile Link:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
                    // document.getElementById('user-img').src= response.picture.data.url;
                    
                    // Save user data
                    saveUserData(response).then(function(handleSession){
                        // convert to JQuery object
                        const sessionObj = JSON.parse(handleSession);
                        afterLoggedinUIHandle(sessionObj);

                    });
                    
                });
            }

            // Save user data to the database
            function saveUserData(userData){
                return $.post("<?php echo base_url('Social_login/saveUsersData'); ?>", {oauth_provider:'facebook', userData: JSON.stringify(userData)},);
            }

            // Logout from facebook
            //<img src="<?php //echo base_url('assets/images/fblogin.png');?>"/>
            function fbLogout() {
                FB.logout(function() {
                    document.getElementById('fbloginbutton').setAttribute("onclick","fbLogin()");
                    document.getElementById('fbloginbutton').innerHTML = '<i class="fab fa-facebook-f"></i>';
                    document.getElementById('userData').innerHTML = '';
                    document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
                    document.getElementById('user-img').src='<?=$ASSETS_URL?>images/man.jpg';
                });
            }

            function afterLoggedinUIHandle(response){
                debugger;
                let parent= $('.man-img');
                if(response.sess_logged_in){
                    //closing the modal
                    $.modal.close();
                    //adding user image
                    $(parent).find('img').attr('src', response.user_profile_img);
                    $("<div>", {
                        'class':"dropdown-content"
                    }).append(
                        '<div class="loginlept_welcome">Welcome</div>'
                    ).append('<a class="loginname_bg" href="javascript:void(0);">' + response.userfullname + '</a>'
                    ).append(`<button name="button" id="disconnect" data-wantlogout="${response.logged_in_id}">Log Out</button>`
                    ).appendTo(".dropdown");
                }else{
                    //logout ui behaviour
                    $(parent).find('img').attr('src', response.noimage);
                    //remove user info dropdown
                    $(parent).find('.dropdown-content').remove();
                    
                }
             
                }

             function handleLogOut(user){
                return $.post("<?php echo base_url('Social_login/logmeOut'); ?>", {action: 'logout', user_data: JSON.stringify(user)}, );
             }   
             
            // functio for countdown
            function getCountdown(targetDateTime, idSelector){
                // debugger;
                // alert(targetDateTime);
                // Set the date we're counting down to
                var countDownDate = new Date(targetDateTime).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();
                    
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                    
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Output the result in an element with id="demo"
                if(days > 0){
                    var countDownResult = days + " Days : " + hours + " Hrs : "
                  + minutes + " Min : " + seconds + " Sec";
                } else {
                //     var countDownResult = days + " Days : " + hours + " Hrs : "
                //   + minutes + " Min : " + seconds + " Sec";
                var countDownResult = hours + " Hrs : "
                  + minutes + " Min : " + seconds + " Sec";
                }
                document.getElementById(idSelector).innerHTML = countDownResult;
                    
                // If the count down is over, write some text 
                if (distance < 0) {
                        clearInterval(x);
                        document.getElementById(idSelector).innerHTML = "EXPIRED";
                    }
                }, 1000);
            }
        </script>
        <?php } ?>

        <script type="text/javascript">
            $(document).ready(function(){
              $(".content").slice(0, 4).show();
              $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".content:hidden").slice(0, 4).slideDown();
                if($(".content:hidden").length == 0) {
                //   $("#loadMore").text("No Podcast Available").addClass("noContent");
                  $("#loadMore").hide();
                }
              });              
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                // countdown
                var currentTimeZone = '<?=date('M d, Y H:i:s')?>';
                var media_publish_start_datetime_current_week = $('#media_publish_start_datetime_current_week').html();
                // console.log(currentTimeZone);
                // console.log(media_publish_start_datetime_current_week);
                if(currentTimeZone < media_publish_start_datetime_current_week){
                   getCountdown(media_publish_start_datetime_current_week, 'currentWeekCountdown'); 
                }                

                var media_publish_start_datetime_next_week = $('#media_publish_start_datetime_next_week').html();
                getCountdown(media_publish_start_datetime_next_week, 'nextWeekCountdown');
            });
        </script>
        <script type="text/javascript">
            function getCurrentDayShows(dayName){
                // $('.day-name').removeClass('clicked');
                // $('.day-name').css("background-color", "");
                $(this).addClass('clicked');
                $(this).css("background-color", "#E0411B");
                $.ajax({
                    type:'POST',
                    url:'<?=base_url('frontend/getCurrentDayShows')?>',
                    dataType: 'JSON',
                    data: { "dayName": dayName },
                    beforeSend: function() {
                        // loader load
                        $('.loadingio-spinner-pulse-4ofwcox9r54').show();
                    },
                    success:function(data){
                        $('.loadingio-spinner-pulse-4ofwcox9r54').hide();
                        if(data.status){
                            // loadingio-spinner-pulse-4ofwcox9r54
                            // current week podcast
                                var responseData1 = data.response.currentDayPodcast;
                                var responseDataCount1 = data.response.currentDayPodcastCount;
                                // console.log(responseData1);
                                var html_1 = '';
                                // console.log(responseData1.length);
                                if(responseDataCount1 > 0){
                                    if(responseData1.media_status){
                                        var currentWeekMediaStatus = '<h5>NOW LIVE</h5> <i class="fas fa-circle"></i>';
                                        var currentWeekJoinCountdown = `<div class="join-button show-episode" data-episoderef="${responseData1.show_slug}/${responseData1.media_slug}/${responseData1.media_ref}">\
                                                                            <p>Join Live <b>Now</b></p>\
                                                                            <i class="fas fa-arrow-right"></i>\
                                                                            <div class="color"></div>\
                                                                        </div>`;
                                    } else {
                                        var currentWeekMediaStatus = '<h5>SCHEDULED</h5>';
                                        var currentWeekJoinCountdown = '<div class="join-button count-button">\
                                                                            <i class="fas fa-stopwatch"></i>\
                                                                            <span id="media_publish_start_datetime_current_week" style="display:none;">' + responseData1.countdown_target_date_time + '</span>\
                                                                            <p>Starts in <span id="currentWeekCountdown"></span></p>\
                                                                            <div class="color"></div>\
                                                                        </div>';
                                    }
                                    $('#currentWeekShow').empty();
                                    html_1 += '<div class="card-con">\
                                                <div class="card-img">\
                                                        <img src="' + responseData1.show_cover_image + '" alt="' + responseData1.media_title + '"  />\
                                                </div>\
                                                <div class="card-content">\
                                                    <div class="now-box">' + currentWeekMediaStatus + '</div>\
                                                    <h3><a href="details/' + responseData1.show_slug + '/' + responseData1.media_slug + '/' + responseData1.encoded_media_id + '">' + responseData1.media_title + '</a></h3>\
                                                    <p>With <b>' + responseData1.media_author + '</b></p>\
                                                    <div class="button-sec">' + currentWeekJoinCountdown + '<div class="share-btn">\
                                                            <i class="fas fa-share"></i>\
                                                            <span>Share</span>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>';
                                    html_1 += '<div class="dash hd-dash"></div>';
                                } else {
                                    html_1  =   '<div class="card-con">\
                                                    <div class="card-img">\
                                                        <img src="https://abp-podcast.keylines.in/uploads/show/no-show.jpg" alt="no-show" class="no-show" />\
                                                    </div>\
                                                </div>';
                                }                              
                                $('#currentWeekShow').html(html_1);
                            // current week podcast
                            // next week podcast
                               
                                var responseData2 = data.response.currentDayNextWeekPodcast;
                                var responseDataCount2 = data.response.currentDayNextWeekPodcastCount;
                                var html_2 = '';
                                if(responseDataCount2 > 0){
                                    if(responseData2.media_status){
                                        var nextWeekMediaStatus = '<h5>NOW LIVE</h5> <i class="fas fa-circle"></i>';
                                        var nextWeekJoinCountdown = `<div class="join-button show-episode" data-episoderef="${responseData2.show_slug}/${responseData2.media_slug}/${responseData2.media_ref}">\
                                                                            <p>Join Live <b>Now</b></p>\
                                                                            <i class="fas fa-arrow-right"></i>\
                                                                            <div class="color"></div>\
                                                                        </div>`;
                                    } else {
                                        var nextWeekMediaStatus = '<h5>UPCOMING</h5>';
                                        var nextWeekJoinCountdown = '<div class="join-button count-button">\
                                                                            <i class="fas fa-stopwatch"></i>\
                                                                            <span id="media_publish_start_datetime_next_week" style="display:none;">' + responseData2.countdown_target_date_time + '</span>\
                                                                            <p>Starts in <span id="nextWeekCountdown"></span></p>\
                                                                            <div class="color"></div>\
                                                                        </div>';
                                    }
                                    $('#nextWeekShow').empty();
                                    html_2 += '<div class="card-con">\
                                                <div class="card-img">\
                                                        <img src="' + responseData2.show_cover_image + '" alt="' + responseData2.media_title + '"  />\
                                                </div>\
                                                <div class="card-content">\
                                                    <div class="now-box upcoming-box">' + nextWeekMediaStatus + '</div>\
                                                    <h3><a href="details/' + responseData2.show_slug + '/' + responseData2.media_slug + '/' + responseData2.encoded_media_id + '">' + responseData2.media_title + '</a></h3>\
                                                    <p>With <b>' + responseData2.media_author + '</b></p>\
                                                    <div class="button-sec">' + nextWeekJoinCountdown + '<div class="share-btn">\
                                                            <i class="fas fa-share"></i>\
                                                            <span>Share</span>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>';
                                } else {
                                    html_2  =   '<div class="card-con">\
                                                    <div class="card-img">\
                                                        <img src="https://abp-podcast.keylines.in/uploads/show/no-show.jpg" alt="no-show" class="no-show" />\
                                                    </div>\
                                                </div>';
                                }
                                $('#nextWeekShow').html(html_2);
                                
                            // next week podcast

                            // after ajax response call coundown if any
                            var currentTimeZone = '<?=date('M d, Y H:i:s')?>';
                            var media_publish_start_datetime_current_week = $('#media_publish_start_datetime_current_week').text();
                            // console.log(currentTimeZone);
                            // console.log(media_publish_start_datetime_current_week);
                            if(currentTimeZone < media_publish_start_datetime_current_week){
                               getCountdown(media_publish_start_datetime_current_week, 'currentWeekCountdown'); 
                            }

                            // var media_publish_start_datetime_current_week = responseData1.countdown_target_date_time;                            
                            // getCountdown(media_publish_start_datetime_current_week, 'currentWeekCountdown');
                            if(data.response.currentDayNextWeekPodcast){
                                var media_publish_start_datetime_next_week = responseData2.countdown_target_date_time;                            
                                getCountdown(media_publish_start_datetime_next_week, 'nextWeekCountdown');
                            }
                            


                        }
                    }
                });
            }

            // Get all the desired elements into a node list
            //Event delegation
            const weeklymenu = document.getElementById('weekdaymenu');

            weeklymenu.addEventListener('click', (event) => {
                weeklymenu.querySelectorAll('.clicked')
                    .forEach(link =>{
                        link.classList.remove('clicked');

                    });
                event.target.parentElement.classList.add('clicked');
            });

            // Get all the desired elements into a node list
            let episode_elements = document.querySelectorAll(".show-episode");
            // Convert the node list into an Array so we can
            // safely use Array methods with it
            let elementsArrayEpisode = Array.prototype.slice.call(episode_elements);
            // Loop over the array of elements
            elementsArrayEpisode.forEach(function(elem){
            // Assign an event handler
            elem.addEventListener("click", function(event){
                media_code= event.currentTarget.getAttribute("data-episoderef");
                takemetoepisode(media_code);
            });
            });

            function takemetoepisode(mediacode){
                var redirect= '<?=base_url('details');?>/' + mediacode;
                window.location.href =  redirect;
            }
            
            
        </script>
        
    </body>
</html>