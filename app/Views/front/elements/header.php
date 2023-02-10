<?php
$localsession  = \Config\Services::session();
$base_url= getenv('baseURL');
$ASSETS_URL     = getenv('ASSETS_URL');
$NO_IMAGE_URL   = $base_url . getenv('NO_IMAGE_URL');
?>
<div class="container-fluid">
    <div class="headerfull_part">
        <div class="headertop_part">
            <div class="logo">
                <a href="<?=base_url()?>">
                    <img src="<?=$ASSETS_URL?>images/logo/logotop.png" alt="">
                </a>
            </div>
            <div class="weeklydate" id="weekdaymenu">
                <div class="owl-carousel owl-theme weeksday_all">
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'MONDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('MONDAY')">
                            <h3>Monday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'TUESDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('TUESDAY')">
                            <h3>Tuesday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'WEDNESDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('WEDNESDAY')">
                            <h3>Wednesday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'THURSDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('THURSDAY')">
                            <h3>Thursday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'FRIDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('FRIDAY')">
                            <h3>Friday</h3>
                        </a>
                    </div>
                    <div class="item">
                        <a class="link day-name <?=(($currentDay == 'SATURDAY') ? 'clicked' : '')?>" onclick="getCurrentDayShows('SATURDAY')">
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
                        <a href="javascript:void(0);" class="nav-link" data-modal="#socialbtn-modal">
                            <button class="dropbtn"><img id="user-img" src="<?=$NO_IMAGE_URL?>" alt="" style="width: 100%; border-radius: 8px;height: 40px;"></button>
                            
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
