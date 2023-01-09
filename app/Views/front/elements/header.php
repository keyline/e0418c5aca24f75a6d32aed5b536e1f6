<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
?>
<div class="container-fluid">
    <div class="logo">
        <a href="<?=base_url()?>" class="nav-link">
            <img src="<?=$ASSETS_URL?>images/logo/Picture 1.png" alt="">
        </a>
    </div>
    <div class="icons">
        <div class="icon-box">
            <a href="javascript:void(0);" onclick="fbLogin();" id="fbloginbutton" class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="icon-box">
            <a href="social" class="nav-link"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="man-img">
            <a href="details" class="nav-link">
                <img src="<?=$ASSETS_URL?>images/man.jpg" alt="" style="width: 100%; border-radius: 8px;">
            </a>
        </div>
    </div>
</div>
<div class="ad-img">
    <img src="<?=$ASSETS_URL?>images/top-ad/Image_53.png" alt="">
</div>
