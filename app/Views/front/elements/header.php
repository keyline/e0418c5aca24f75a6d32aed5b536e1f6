<?php
$this->session  = \Config\Services::session();
$ASSETS_URL     = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<div class="container-fluid">
    <div class="logo">
        <a href="<?=base_url()?>" class="nav-link">
            <img src="<?=$ASSETS_URL?>images/logo/Picture 1.png" alt="">
        </a>
    </div>
    <div class="icons">
        <div class="icon-box">
            <a target="_blank" href="<?=$site_setting->facebook_link?>" class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="icon-box">
            <a target="_blank" href="<?=$site_setting->instagram_link?>" class="nav-link"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="man-img">
            <div class="dropdown">
                <a href="javascript:void(0);" class="nav-link">
                    <button class="dropbtn"><img id="user-img" src="<?=$NO_IMAGE_URL?>" alt="" style="width: 100%; border-radius: 8px;height: 32px;"></button>
                    <div class="dropdown-content">
                        <a href="javascript:void(0);" id="fbloginbutton" onclick="fbLogin();">Sign In</a>
                        <a href="javascript:void(0);">Sign Out</a>
                        <a href="javascript:void(0);">Welcome Username</a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="ad-img">
    <img src="<?=base_url('/uploads/banners/'.$header_ads->advertisment_image)?>" alt="">
</div>
