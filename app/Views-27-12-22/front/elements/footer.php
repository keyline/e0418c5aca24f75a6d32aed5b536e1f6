<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a href="<?=base_url()?>" class="footer-logo">
                    <img src="<?=base_url('/uploads/'.$site_setting->site_footer_logo)?>" alt="<?=$site_setting->site_name?>">
                </a>
                <div class="social">
                    <h4>Follow us on:</h4>
                    <ul>
                        <li>
                            <a href="<?=$site_setting->facebook_link?>" class="" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$site_setting->twitter_link?>" class="" target="_blank">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$site_setting->linkedin_link?>" class="" target="_blank">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$site_setting->youtube_link?>" class="" target="_blank">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-link">
                    <h4>Download mobile App</h4>
                    <ul>
                        <li>
                            <a href="https://play.google.com/store/apps/details?id=com.abp.infocom" target="_blank">
                                <img src="<?=base_url('/material/front/')?>/assets/images/google-play.png" alt="<?=$site_setting->site_name?>">
                            </a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/in/app/infocom/id1489955178" target="_blank">
                                <img src="<?=base_url('/material/front/')?>/assets/images/apple-store.png" alt="<?=$site_setting->site_name?>">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copy-right hideon_mobile">
                    <ul>
                        <li>Copyright © 2016-<?=date('Y')?></li>
                        <li>
                            <a href="<?=base_url('page/disclaimer')?>">Disclaimer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-nav">
                    <ul>
                        <li><a href="<?=base_url()?>">HOME</a></li>
                        <li><a href="javascript:void(0);">ABOUT US</a>
                            <ul>
                                <li>
                                    <a href="<?=base_url('page/about-infocom')?>">About INFOCOM</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('page/about-abp')?>">About ABP</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li><a href="<?=base_url('event/infocom-calcutta-2022')?>">EVENTS</a>
                            <ul>
                                <li>
                                    <a href="https://indianinfocom.keylines.in/index/events/flagship-event">Flagship Event</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">State Level Initiative</a>
                                </li>
                                <li>
                                    <a href="https://indianinfocom.keylines.in/index/events/round-table">Round Table</a>
                                </li>
                                <li>
                                    <a href="https://indianinfocom.keylines.in/index/events/industry-virtual-sessions">International</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li><a href="javascript:void(0);">AWARDS</a></li> -->
                        <li><a href="<?=base_url('speakers')?>">STAR SPEAKERS</a></li>
                        <li><a href="<?=base_url('contact-us')?>">CONTACT US</a></li>
                        <li><a href="javascript:void(0);">ARCHIVE</a>
                            <ul>
                                <li><a href="https://www.indiainfocom.com/2021/" target="_blank">Infocom 2021</a></li>
                                <li><a href="https://www.indiainfocom.com/2020/" target="_blank">Infocom 2020</a></li>
                                <li><a href="https://www.indiainfocom.com/2019/" target="_blank">Infocom 2019</a></li>
                                <li><a href="https://www.indiainfocom.com/2018/" target="_blank">Infocom 2018</a></li>
                                <li><a href="https://www.indiainfocom.com/2017/" target="_blank">Infocom 2017</a></li>
                                <li><a href="https://www.indiainfocom.com/2016/" target="_blank">Infocom 2016</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="subscribe_mail">
                    <h3>To SUBSCRIBE our newsletter</h3>
                    <form id="subscribeForm">
                        <div class="formdiv">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email" onfocus="javascript:onfocus_eve(this)" onblur="javascript:onfocus_eve(this)">
                            <span class="label label-success subscribe" id="subscribe-succ" style="display:none;"></span>
                            <span class="label label-danger subscribe" id="subscribe-err" style="display:none;"></span>
                            <button type="submit" id="subscription_button" class="email_submit">Subscribe <i class="icon">→</i></button>
                        </div>
                    </form>
                    <!-- <div class="formdiv">
                        <input type="email" name="email_subscription" id="email_subscription"
                            class="form-control" placeholder="Please enter your email" onfocus="javascript:onfocus_eve(this)"
                            onblur="javascript:onfocus_eve(this)">

                        <button type="submit" onclick="javascript:email_subscribe(this);"
                            id="subscription_button" class="email_submit">Subscribe <i
                                class="icon">→</i></button>                        

                    </div> -->
                </div>
                <div class="contact-info">
                    <h3>CONTACT DETAILS</h3>
                    <ul>
                        <li>
                            <a href="tel:<?=$site_setting->site_phone?>"><i class="fa fa-mobile" aria-hidden="true"></i> <?=$site_setting->site_phone?></a>
                        </li>
                        <li>
                            <a href="mailto:<?=$site_setting->admin_email?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$site_setting->admin_email?></a>
                        </li>
                    </ul>
                </div>
                <div class="copy-right hideon_desktop mobile_copy">
                    <ul>
                        <li>Copyright © 2016-<?=date('Y')?></li>
                        <li>
                            <a href="<?=base_url('page/disclaimer')?>">Disclaimer</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="rainbow">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--
<div class="container" id="cookie-container">
    <div class="row">
        <div class="col-md-12">
            <div class="cookie-setting">
                <p>We use cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits. By clicking "Accept", you consent to use of ALL the cookies.</p>
                <button type="button" class="btn btn-danger">DENY</button>
                <button type="button" class="btn btn-success" onclick="setCookie();">ACCEPT</button>
            </div>
        </div>
    </div>
</div>
-->