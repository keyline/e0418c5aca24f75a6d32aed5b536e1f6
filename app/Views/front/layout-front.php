<?php
$pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
$ASSETS_URL = getenv('ASSETS_URL');
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
        <script src="<?=$ASSETS_URL?>splide-4.1.3/dist/js/splide.min.js"></script>
        <script>
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
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <?php if (empty($_GET['page'])) { ?>
        <script type="text/javascript" src="<?=$ASSETS_URL?>jwplayer/4Q2lEcj7.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>redirect-ajax.js"></script>
        <script type="text/javascript" src="<?=$ASSETS_URL?>owl-min.js"></script>
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
        document.getElementById('fbloginbutton').setAttribute("onclick","fbLogout()");
        document.getElementById('fbloginbutton').innerHTML = 'Logout from Facebook';
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
        document.getElementById('userData').innerHTML = '<div style="position: relative;"><img src="" /><img style="position: absolute; top: 90%; left: 25%;" src="'+response.picture.data.url+'"/></div><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Profile Link:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
        document.getElementById('user-img').src= response.picture.data.url;
        
        // Save user data
        saveUserData(response);
    });
}

// Save user data to the database
function saveUserData(userData){
    $.post("<?php echo base_url('Social_login/saveUsersData'); ?>", {oauth_provider:'facebook', userData: JSON.stringify(userData)}, function(data){ return true; });
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
</script>
        <?php } ?>
    </body>
</html>