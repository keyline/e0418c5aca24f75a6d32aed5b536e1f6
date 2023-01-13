<?php
$pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?=$head?>
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

        <!-- <script src="<?=$ASSETS_URL?>splide-4.1.3/dist/js/splide.min.js"></script> -->
        <!-- <script>
            var splide1 = new Splide('.splide1', {
                type: 'loop',
                gap: 10,
                arrows: false,
                pagination: false,
                mediaQuery: 'min',
                breakpoints: {
                    0: {
                        focus: 'center',
                        perPage: 4
                    },
                    600: {
                        focus: 0,
                        perPage: 4,
                    },
                    1000: {
                        perPage: 7,
                        focus: 'center',
                        // destroy:true,
                    }
                },
            });
            splide1.mount();
        </script> -->
        <!-- <script src="https://accounts.google.com/gsi/client" async defer></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>  
        <?php if (empty($_GET['page'])) { ?>
        <script type="text/javascript" src="<?=$ASSETS_URL?>jwplayer/4Q2lEcj7.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>redirect-ajax.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>owl-min.js"></script>
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
                //document.getElementById('fbloginbutton').setAttribute("onclick","fbLogout()");
                //document.getElementById('fbloginbutton').innerHTML = 'Logout from Facebook';
                //document.getElementById('disconnect').style.display='block';
                //document.getElementById('disconnect').innerHTML = 'Logout from Facebook';
                //document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
                //document.getElementById('userData').innerHTML = '<div style="position: relative;"><img src="" /><img style="position: absolute; top: 90%; left: 25%;" src="'+response.picture.data.url+'"/></div><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Profile Link:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
                //document.getElementById('user-img').src= response.picture.data.url;
//                 const closeModalsBtn = document.querySelectorAll(".modal-box__exit-button");

//                 closeModalsBtn.forEach(closeBtn=>{
//   closeBtn.addEventListener('click' , (e) =>{
//     e.currentTarget.parentElement.parentElement.parentElement.parentElement.style.display = 'none'
//   })
// });

                // Save user data
                saveUserData(response);
            });
        }

        // Save user data to the database
        function saveUserData(userData){
            $.post("<?php echo base_url('Social_login/saveUsersData'); ?>", {oauth_provider:'facebook', userData: JSON.stringify(userData)}, function(data){ return true});
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
        //Google singin
        function renderButton() {
            gapi.signin2.render('gConnectBtn', {
                'scope': 'profile email',
                'width': 250,
                'height': 40,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSignIn,
                'onfailure': onFailure
            });
        }

        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            // Retrieve the Google account data
            gapi.client.load('oauth2', 'v2', function () {
                var request = gapi.client.oauth2.userinfo.get({
                    'userId': 'me'
            });
            request.execute(function (resp) {
                // Display the user details
                var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
                profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
                document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
                
                //document.getElementById("gConnectBtn").style.display = "none";
                document.getElementsByClassName("userContent")[0].style.display = "block";
                
                saveGoogleUserData(resp); // save data to our database for reference

            });
    });
            
        }
        // Sign-in failure callback
        function onFailure(error) {
            alert("Sign in error");
            console.table(error)
        }
        // Sign out the user
        // Sign out the user
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                document.getElementsByClassName("userContent")[0].innerHTML = '';
                document.getElementsByClassName("userContent")[0].style.display = "none";
                document.getElementById("gConnectBtn").style.display = "block";
            });
            
            auth2.disconnect();
        }

        //Saving google user
        function saveGoogleUserData(userData){
            $.post("<?php echo base_url('Social_login/oauth2callback'); ?>",{ oauth_provider:'google', userData: JSON.stringify(userData) },
        function (response) {
        // var data = response.split('^');
        // if (data[1] == "loggedIn"){
        //     $("#loaderIcon").hide('fast');
        //     $("#g-signin2").hide('fast');
        //     $("#profileLabel").attr('src',profile);
        //     $("#nameLabel").html(name);
        //     $("#emailLabel").html(email);
        //     $("#googleIdLabel").html(googleTockenId);
        //     $("#loginDetails").show();
        // }
    });

        }

        // function handleCredentialResponse(response) {
        //   console.log("Encoded JWT ID token: " + response.credential);
        //   console.table(response);
        //   const responsePayload = decodeJwtResponse(response.credential);

        //     console.log("ID: " + responsePayload.sub);
        //     console.log('Full Name: ' + responsePayload.name);
        //     console.log('Given Name: ' + responsePayload.given_name);
        //     console.log('Family Name: ' + responsePayload.family_name);
        //     console.log("Image URL: " + responsePayload.picture);
        //     console.log("Email: " + responsePayload.email);
        // }
        // window.onload = function () {
        //   google.accounts.id.initialize({
        //     client_id: "890714183723-hhlf2hkq306qlo81vmbecigtsjrjcj7f.apps.googleusercontent.com",
        //     callback: handleCredentialResponse
        //   });
        //   google.accounts.id.renderButton(
        //     document.getElementById("gConnectBtn"),
        //     { theme: "outline", size: "medium" }  // customization attributes
        //   );
        //   google.accounts.id.prompt(); // also display the One Tap dialog
        // }
        </script>
        <?php } ?>

        <script type="text/javascript">
            $(document).ready(function(){
              $(".content").slice(0, 2).show();
              $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".content:hidden").slice(0, 2).slideDown();
                if($(".content:hidden").length == 0) {
                  $("#loadMore").text("No Podcast Available").addClass("noContent");
                }
              });
              
            });
        </script>

    
    </body>
</html>