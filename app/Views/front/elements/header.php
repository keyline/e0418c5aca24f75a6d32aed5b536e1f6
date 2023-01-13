<?php
$this->session  = \Config\Services::session();
$ASSETS_URL     = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<div class="container-fluid">
    <div class="headerfull_part">
        <div class="headertop_part">
            <div class="logo">
                <a href="<?=base_url()?>" class="nav-link">
                    <img src="<?=$ASSETS_URL?>images/logo/logotop.png" alt="">
                </a>
            </div>
            <div class="weeklydate">
                <div class="owl-carousel owl-theme weeksday_all">
                    <div class="item">
                        <a class="link clicked">
                            <h3>Monday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link">
                            <h3>Tuesday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link">
                            <h3>Wednesday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link">
                            <h3>Thursday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link">
                            <h3>Friday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link">
                            <h3>Saturday</h3>
                        </a>
                    </div>
                </div>
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
                                <!-- <a href="javascript:void(0);" id="fbloginbutton" onclick="fbLogin();">Sign In</a> -->
                                <!-- <a href="javascript:void(0);">Sign Out</a> -->
                                <button name="button" id="disconnect" style="display:none;">Disconnect</button>
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
    </div>
</div>
