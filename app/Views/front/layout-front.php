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
        <div id="socialbtn-modal" class="modal">
        <!-- <p>Thanks for clicking. That felt good.</p> -->
        <h3>Login with your account</h3>
        <div class="logininner">
            <div class="logiinicon-box">
                    <a href="javascript:void(0)" onclick="fbLogin()" id="fbloginbutton" class="nav-link"> <i class="fab fa-facebook-f"></i> Facebook</a>
                </div>
                <!-- if gsi client library commented on localhost then comment below div -->
            <div id="gConnectBtn"></div>
        </div>
        </div>        
        <!-- <script src="https://accounts.google.com/gsi/client" async defer></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>  
        <!-- in localhost it may generate error better comment it -->
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <!-- JW Player -->
        <script src="https://cdn.jwplayer.com/libraries/c1QdRr9B.js"></script>

        <script type="text/javascript" src="<?=$ASSETS_URL?>/js/jquery.countdown.js"></script>
        
        <?php if (empty($_GET['page'])) { ?>
        <!-- test account player js     -->
        <!-- <script type="text/javascript" src="<?=$ASSETS_URL?>jwplayer/4Q2lEcj7.js"></script> -->
         <!-- live account player js     -->
        
        <!-- <script type="text/javascript" src="<?=$ASSETS_URL?>redirect-ajax.js"></script> -->
        <script type="text/javascript" src="<?=$ASSETS_URL?>owl-min.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>/js/mypodcast_home_ui.js"></script>
        <!-- Moment js -->
        <script type="text/javascript" src="<?=$ASSETS_URL?>/js/moment_2_29_4.js"></script>
        <!-- <script type="text/javascript" src="<?=$ASSETS_URL?>/js/mypodcast_social_handle.js"></script> -->

        


        
        <?php } ?>

        
        <script type="text/javascript">
            $(document).ready(function(){
                // countdown
                //var currentTimeZone = '<?=date('M d, Y H:i:s')?>';
                //var media_publish_start_datetime_current_week = $('#media_publish_start_datetime_current_week').html();
                // console.log(currentTimeZone);
                // console.log(media_publish_start_datetime_current_week);
                //if(currentTimeZone < media_publish_start_datetime_current_week){
                   //getCountdown(media_publish_start_datetime_current_week, 'currentWeekCountdown'); 
                //}                

                //var media_publish_start_datetime_next_week = $('#media_publish_start_datetime_next_week').html();

                //let currentWeekDt=moment(media_publish_start_datetime_current_week);
                // if(currentWeekDt.isValid()){
                //     $('#currentWeekCountdown').countdown(currentWeekDt.format('YYYY-MM-DD HH:mm:ss'))
                // .on('update.countdown', function(event){
                //     var $this = $(this).html(event.strftime(''
                //         + '<span>%-D</span> days%!d '
                //         + '<span>%H</span> hr '
                //         + '<span>%M</span> min '
                //         + '<span>%S</span> sec'));
                // })
                // .on('finish.countdown', function(){console.log('Finished callback')});
                // }

                $('[data-countdownstart]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdownstart');
                
                $this.countdown(finalDate, function(event) {
                    //var totalHours = event.offset.totalDays * 24 + event.offset.hours;
                    //$this.html(event.strftime('%D days %H:%M:%S'));
                    $this.find('.show-countdown').html(event.strftime(''
                        + '<span>%-D</span> day%!d '
                        + '<span>%H</span> hr '
                        + '<span>%M</span> min '
                        + '<span>%S</span> sec')
                    );
                })
                .on('update.countdown', function(event) {
                console.log("Update fired");
                // var format = '%H:%M:%S';
                // if(event.offset.totalDays > 0) {
                //     format = '%-d day%!d ' + format;
                // }
                // if(event.offset.weeks > 0) {
                //     format = '%-w week%!w ' + format;
                // }
                // $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                //console.log("Finshed fired");
                //console.table($this);
                // $(this).find('.show-countdown').html('This offer has expired!')
                //     .parent().addClass('disabled');
                window.location.href = window.location.href;

                });
                });

                $('[data-countdownfinish]').each(function(){
                    var $this = $(this), finalDate = $(this).data('countdownfinish');
                    var mediaref= $(this).data('media-ref');
                    $this.countdown(finalDate, function(event) {
                    //var totalHours = event.offset.totalDays * 24 + event.offset.hours;
                    //$this.html(event.strftime('%D days %H:%M:%S'));
                    // $this.find('.show-countdown').html(event.strftime(''
                    //     + '<span>%-D</span> day%!d '
                    //     + '<span>%H</span> hr '
                    //     + '<span>%M</span> min '
                    //     + '<span>%S</span> sec')
                    // );
                })
                .on('update.countdown', function(event) {
                console.log("Finishing Update fired");
                // var format = '%H:%M:%S';
                // if(event.offset.totalDays > 0) {
                //     format = '%-d day%!d ' + format;
                // }
                // if(event.offset.weeks > 0) {
                //     format = '%-w week%!w ' + format;
                // }
                // $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    let id = event.target.dataset.mediaref;

                console.log("Finshed fired at ending show : " + id);
                //console.table($this);
                // $(this).find('.show-countdown').html('This offer has expired!')
                //     .parent().addClass('disabled');
                    finishLiveStream({'media_id': id}).then(function(resp){
                        //console.log(resp);
                        window.location.href = window.location.href;
                    });

                });

                })
                

                // Get all the desired elements into a node list
            //Event delegation
            //const weeklymenu = document.getElementById('weekdaymenu');

            // weeklymenu.addEventListener('click', (event) => {
            //     weeklymenu.querySelectorAll('.clicked')
            //         .forEach(link =>{
            //             link.classList.remove('clicked');

            //         });
            //     event.target.parentElement.classList.add('clicked');
            // });

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

            //Social handle
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
    window.fbAsyncInit = function () {
        // FB JavaScript SDK configuration and setup
        FB.init({
            appId: '564063147297627', // FB App ID
            cookie: true,  // enable cookies to allow the server to access the session
            xfbml: true,  // parse social plugins on this page
            version: 'v15.0' // use graph api version 2.10
        });

        // Check whether the user already logged in
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                //display user data
                getFbUserData();
            } else {
                //soft login modal
                //$("#socialbtn-modal").modal();

            }
        });
    };

    // Load the JavaScript SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

            });

            //Social login methods
            function afterLoggedinUIHandle(response) {
        debugger;
        let parent = $('.man-img');
        if (response.sess_logged_in) {
            //closing the modal
            $.modal.close();
            //adding user image
            $(parent).find('img').attr('src', response.user_profile_img);
            $("<div>", {
                'class': "dropdown-content"
            }).append(
                '<div class="loginlept_welcome">Welcome</div>'
            ).append('<a class="loginname_bg" href="javascript:void(0);">' + response.userfullname + '</a>'
            ).append(`<button name="button" id="disconnect" data-wantlogout="${response.logged_in_id}">Log Out</button>`
            ).appendTo(".dropdown");
        } else {
            //logout ui behaviour
            $(parent).find('img').attr('src', response.noimage);
            //remove user info dropdown
            $(parent).find('.dropdown-content').remove();

        }

    }

    function handleLogOut(user) {
        return $.post("<?php echo base_url('Social_login/logmeOut'); ?>", { action: 'logout', user_data: JSON.stringify(user) },);
    }

    // Facebook login with JavaScript SDK
    function fbLogin() {
        FB.login(function (response) {
            if (response.authResponse) {
                // Get and display the user profile data
                getFbUserData();
            } else {
                document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
            }
        }, { scope: 'email' });
    }

    // Fetch the user profile data from facebook
    function getFbUserData() {
        FB.api('/me', { locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,cover' },
            function (response) {
                // document.getElementById('fbloginbutton').setAttribute("onclick","fbLogout()");
                // document.getElementById('fbloginbutton').innerHTML = 'Logout from Facebook';
                // document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
                // document.getElementById('userData').innerHTML = '<div style="position: relative;"><img src="" /><img style="position: absolute; top: 90%; left: 25%;" src="'+response.picture.data.url+'"/></div><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Profile Link:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
                // document.getElementById('user-img').src= response.picture.data.url;

                // Save user data
                saveUserData(response).then(function (handleSession) {
                    // convert to JQuery object
                    const sessionObj = JSON.parse(handleSession);
                    afterLoggedinUIHandle(sessionObj);

                });

            });
    }

    // Save user data to the database
    function saveUserData(userData) {
        return $.post("<?php echo base_url('Social_login/saveUsersData'); ?>", { oauth_provider: 'facebook', userData: JSON.stringify(userData) },);
    }

    // Logout from facebook
//<img src="<?php //echo base_url('assets/images/fblogin.png');?>"/>
    function fbLogout() {
        FB.logout(function () {
            document.getElementById('fbloginbutton').setAttribute("onclick", "fbLogin()");
            document.getElementById('fbloginbutton').innerHTML = '<i class="fab fa-facebook-f"></i>';
            document.getElementById('userData').innerHTML = '';
            document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
            document.getElementById('user-img').src = '<?=$ASSETS_URL?>images/man.jpg';
        });
    }


    //Saving google user
    function saveGoogleUserData(userData) {
        $.ajaxSetup({
            headers: {

                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        return $.post("<?php echo base_url('Social_login/oauth2callback'); ?>", JSON.stringify({ oauth_provider: 'Google', id_token: userData }),);

    }

    function handleCredentialResponse(response) {
        console.log("Encoded JWT ID token: " + response.credential);
        saveGoogleUserData(response.credential).then(function (handleSession) {

            // convert to JQuery object
            const sessionObj = JSON.parse(handleSession);
            afterLoggedinUIHandle(sessionObj);

        });

    }

                function takemetoepisode(mediacode){
                var redirect= '<?=base_url('details');?>/' + mediacode;
                window.location.href =  redirect;
            }

            function finishLiveStream(input){
        return $.post('<?= base_url('end/livestream')?>', JSON.stringify(input));
    }
        </script>
      
    </body>
</html>