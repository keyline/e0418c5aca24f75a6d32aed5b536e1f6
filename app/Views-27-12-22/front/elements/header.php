<?php
$this->session = \Config\Services::session();
?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TX2KBZV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url()?>">
                <img src="<?=base_url('/uploads/'.$site_setting->site_logo)?>" alt="<?=$site_setting->site_name?>">
            </a>
            <ul class="nav navbar-nav quick-nav">
                <li class="head_buyticket">
                    <!-- <a href="<?=base_url('contact-us')?>" class="d-flex align-items-center">
                        <span class="icon-wrapper">
                            <img src="<?=base_url('/material/front/')?>/assets/icons/mail.png" alt="<?=$site_setting->site_name?>">
                        </span>
                        <span>
                            <small>Get in Touch</small>
                            contact us
                        </span>
                    </a> -->
                    <!-- <a href="<?=base_url('new-booking')?>">
                        <img src="<?=base_url('/material/front/assets/images')?>/head_ticket.svg" alt="<?=$site_setting->site_name?>">
                    </a> -->
                </li>
                <?php if($this->session->get('is_user_login')){?>
                    <li>
                        <a href="<?=base_url('dashboard')?>" class="d-flex align-items-center">
                            <span class="icon-wrapper">
                                <img src="<?=base_url('/material/front/')?>/assets/icons/register.png" alt="<?=$site_setting->site_name?>">
                            </span>
                            <span><small>Welcome</small><?=$this->session->get('name')?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="d-flex align-items-center userLogout">
                            <span class="icon-wrapper">
                                <img src="<?=base_url('/material/front/')?>/assets/icons/login.png" alt="<?=$site_setting->site_name?>">
                            </span>
                            <span><small>Logged User</small>Log Out</span>
                        </a>
                    </li>
                <?php } else {?>
                    <li>
                        <a href="<?=base_url('signin')?>" class="d-flex align-items-center">
                            <span class="icon-wrapper">
                                <img src="<?=base_url('/material/front/')?>/assets/icons/login.png" alt="<?=$site_setting->site_name?>">
                            </span>
                            <span><small>Existing User</small>Log in</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('signup')?>" class="d-flex align-items-center">
                            <span class="icon-wrapper">
                                <img src="<?=base_url('/material/front/')?>/assets/icons/register.png" alt="<?=$site_setting->site_name?>">
                            </span>
                            <span><small>New User</small>Register</span>
                        </a>
                    </li>
                <?php }?>
            </ul>
            <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse"
                data-target="#home-new-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="home-new-navbar-collapse">
            <button class="navbar-close">
                <img src="<?=base_url('/material/front/')?>/assets/icons/close.svg" alt="" width="35" height="35">
            </button>
            <ul class="nav navbar-nav">
                <li class="first"><a href="<?=base_url()?>">HOME</a></li>
                <li><a href="<?=base_url('page/about-abp')?>">About Us</a></li>
                <li><a href="<?=base_url('event/infocom-calcutta-2022')?>">events</a>
                    <!-- <ul style="display: none;">
                        <li class="first"><a href="https://indianinfocom.keylines.in/index/events/flagship-event">Flagship Event</a></li>
                        <li><a href="https://indianinfocom.keylines.in/index/events/round-table">Round Table</a>
                        </li>
                        <li class="last"><a href="https://indianinfocom.keylines.in/index/events/industry-virtual-sessions">Industry Virtual Sessions</a></li>
                    </ul>
                    <button class="ceret"><i class="fa fa-angle-down" aria-hidden="true"></i></button> -->
                </li>
                <!-- <li><a href="https://indianinfocom.keylines.in/cio_wall">CIO Wall</a></li> -->
                <li class="last"><a href="#">Archive</a>
                    <ul style="display: none;">
                        <li class="first"><a href="https://www.indiainfocom.com/2021/" target="_blank">Infocom 2021</a></li>
                        <li><a href="https://www.indiainfocom.com/2020/" target="_blank">Infocom 2020</a></li>
                        <li><a href="https://www.indiainfocom.com/2019/" target="_blank">Infocom 2019</a></li>
                        <li><a href="https://www.indiainfocom.com/2018/" target="_blank">Infocom 2018</a></li>
                        <li><a href="https://www.indiainfocom.com/2017/" target="_blank">Infocom 2017</a></li>
                        <li class="last"><a href="https://www.indiainfocom.com/2016/" target="_blank">Infocom 2016</a></li>
                    </ul>
                    <button class="ceret"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="menu-overlay"></div>