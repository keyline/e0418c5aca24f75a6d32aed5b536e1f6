<section id="home-banner">
    <div class="home-slider">
        
        <div class="home-banner-slider">
            
            <div class="item banner_fist" style="background: url('<?=base_url('/material/front/')?>/assets/images/home_banner33.jpg');">
                <div class="banner-caption">
                    <div class="infocom-banner-logo-wrapper">
                        <img src="<?=base_url('/material/front/')?>/assets/images/infocom-logo-2022.jpg" alt="">
                        <img src="<?=base_url('/material/front/')?>/assets/images/abp-intiative.jpg" alt="">
                        <p><?=$event->event_date?> Calcutta</p>
                    </div>
                    <h2>Get Ready to Embrace the age of change makers. Get Ready to redefine leadership.</h2>
                    <h3>India’s top Business, Technology and Leadership Conference is back!</h3>
                    <a href="<?=base_url('event/infocom-calcutta-2022')?>" class="btn btn-default">Explore Event</a>
                </div>
            </div>
            <div class="item banner_other" style="background: url('<?=base_url('/material/front/')?>/assets/images/banner_baba.jpg');">
                <!-- <div class="banner_left_imge"><img src="<?=base_url('/material/front/')?>/assets/images/banner_new1.png" alt=""></div> -->
                <div class="banner-caption">
                    <h4>Sadhguru</h4>
                    <h2>Get Ready to Embrace the age of change makers. Get Ready to redefine leadership.</h2>
                    <h3>India’s top Business, Technology and Leadership Conference is back!</h3>
                    <a href="<?=base_url('signin')?>" class="btn btn-default">Book your slot</a>
                </div>
            </div>
            <div class="item banner_other" style="background: url('<?=base_url('/material/front/')?>/assets/images/banner_gavaskar.jpg');">
                <!-- <div class="banner_left_imge"><img src="<?=base_url('/material/front/')?>/assets/images/banner_new2.png" alt=""></div> -->
                <div class="banner-caption">
                    <h4>Sunil Gavaskar, Gundappa Viswanath</h4>
                    <h2>Get Ready to Embrace the age of change makers. Get Ready to redefine leadership.</h2>
                    <h3>India’s top Business, Technology and Leadership Conference is back!</h3>
                    <a href="<?=base_url('signin')?>" class="btn btn-default">Book your slot</a>
                </div>
            </div>
            <div class="item banner_other" style="background: url('<?=base_url('/material/front/')?>/assets/images/banner_devdutta.jpg'); ">
                <!-- <div class="banner_left_imge"><img src="<?=base_url('/material/front/')?>/assets/images/banner_new3.png" alt=""></div> -->
                <div class="banner-caption">
                    <h4>Devdutt Pattanaik</h4>
                    <h2>Get Ready to Embrace the age of change makers. Get Ready to redefine leadership.</h2>
                    <h3>India’s top Business, Technology and Leadership Conference is back!</h3>
                    <a href="<?=base_url('signin')?>" class="btn btn-default">Book your slot</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="home-intro" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="intro-title-wrap">
                    <h2>About us</h2>
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
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            INFOCOM, an initiative from the house of ABP was started in 2002 as a forum that
                            would demonstrate India's quest to be the IT superpower, and has today turned into a
                            forceful and dynamic event that sets the pace for development in the Information and
                            Communication Technology (ICT) sector, bringing potential partners together and
                            helping the industry connect with associates and customers. INFOCOM today is one of
                            the largest congregations of ICT professionals, buyers-sellers, corporate leaders,
                            academics, visionaries, and policymakers in India.
                        </p>

                        <div class="home-intro-hero">
                            <div class="home-intro-hero-imgs">
                                <img src="<?=base_url('/material/front/')?>/assets/images/abp-logo.jpg" alt="" width="" height="">
                                <a href="#!" target="_blank">www.abp.in</a>
                            </div>
                            <div>
                                Founded in 1922, the ABP Group is one of the foremost media conglomerates in
                                India having 11 premier publications, three 24-hour national TV news channels, a
                                leading book publishing business as well as various mobile and internet
                                properties. ABP’s portfolio covers a gamut of genres and encompasses premium
                                brands like — Anandabazar Patrika, The Telegraph, Fortune India, Ebela, ABP
                                News, ABP Ananda, ABP Majha and many more…
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <img src="<?=base_url('/material/front/')?>/assets/images/intro-thumb.jpg" alt="" width="566" height="362"> -->
                        <div class="video-thumb-click" data-video="bT9H83i9AHg">
                            <div class="video-main">
                                <div class="waves-block">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                                <span class="video-play"><i class="fa fa-play"></i></span>
                            </div>
                            <img src="https://img.youtube.com/vi/bT9H83i9AHg/hqdefault.jpg" alt="" width="566" height="362">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="speakers" class="section-padding grey">
    <div class="container-fluid">
        <div class="title-wrap">
            <h2>
                speakers
                <small>@ INFOCOM CALCUTTA <?=date('Y')?></small>
            </h2>
        </div>
        <div class="speakers-carousel">
            <?php if($speakers){ foreach($speakers as $row){?>
            <div class="carousle-block">
                <div class="img-circle-wrapper">
                    <div class="img-wrapper">
                        <img src="<?=base_url('/uploads/speakers/'.$row->image)?>" alt="<?=$row->name?>">
                    </div>
                </div>
                <div class="carousle-block-content">
                    <h4><?=$row->name?></h4>
                    <p><?=$row->designation?></p>
                    <p><?=$row->company_name?></p>
                </div>
            </div>
            <?php } }?>
            
        </div>
        <a href="<?=base_url('speakers')?>" class="btn">View All</a>
    </div>
</section>
<section id="home-video-gallery" class="section-padding">
    <div class="container">
        <div class="title-wrap">

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
            <h2>Explore Gallery</h2>

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
        <div class="row">
            <!-- <div class="col-lg-1">
                <img src="<?=base_url('/material/front/')?>/assets/images/ad-1.jpg" alt="">
                <img src="<?=base_url('/material/front/')?>/assets/images/ad-2.jpg" alt="" class="mobile">
            </div> -->
            <div class="col-lg-10 col-lg-offset-1">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <!-- <li role="presentation" class="active"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li> -->
                    <!-- <li role="presentation"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Image</a></li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="video">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="embed__container">
                                    <div id="player"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="carousel__wrap">
                                    <ul>
                                        <?php if($videoGallery){ $i=1; foreach($videoGallery as $row){?>
                                        <li <?php if($i==1){?>class="active"<?php }?>>
                                            <div data-video="<?=$row->video_code?>" class="video-thumb">
                                                <img src="https://img.youtube.com/vi/<?=$row->video_code?>/hqdefault.jpg" />
                                            </div>
                                            <div class="carousel-thumb-content">
                                                <h6>Theme Keynote: </h6>
                                                <p><?=$row->video_description?></p>
                                            </div>
                                        </li>
                                        <?php $i++; } }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="<?=base_url('video-gallery')?>" class="btn">View All</a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="image">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="playerbox"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="img-gallery-thumb">
                                    <ul>
                                        <?php if($imageGallery){ $i=1; foreach($imageGallery as $row){?>
                                        <li <?php if($i==1){?>class="active"<?php }?>>
                                            <img class="home-img-gallery" src="<?=base_url('/uploads/gallery/'.$row->image_file)?>" alt="<?=$row->image_title?>" />
                                        </li>
                                        <?php $i++; } }?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <img src="<?=base_url('/material/front/')?>/assets/images/ad-1.jpg" alt=""> --
                <img src="<?=base_url('/material/front/')?>/assets/images/ad-2.jpg" alt="" class="mobile">
            </div> -->
        </div>
    </div>
</section>
<section id="sponsers" class="section-padding grey">
    <div class="container">
        <div class="title-wrap">
            <h2>
                SPONSORS
                <small>@ INFOCOM CALCUTTA 2022</small>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blue sponser-block">
                            <!-- <h4>HOST STATE</h4> -->
                            <div class="sponser-carousel">
                                <?php if($sponsors1){ $i=1; foreach($sponsors1 as $row){?>
                                    <div class="item">
                                        <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><p><?=$row->sponsor_name?></p></a>
                                        <div class="sponser-img-wrap">
                                            <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>"></a>
                                        </div>
                                    </div>
                                <?php $i++; } }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="red sponser-block">
                            <!-- <h4>GOLD SPONSORS</h4> -->
                            <div class="sponser-carousel">
                                <?php if($sponsors2){ $i=1; foreach($sponsors2 as $row){?>
                                    <div class="item">
                                        <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><p><?=$row->sponsor_name?></p></a>
                                        <div class="sponser-img-wrap">
                                            <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>"></a>
                                        </div>
                                    </div>
                                <?php $i++; } }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="green sponser-block">
                            <!-- <h4>SPONSORS</h4> -->
                            <div class="sponser-carousel">
                                <?php if($sponsors3){ $i=1; foreach($sponsors3 as $row){?>
                                    <div class="item">
                                        <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><p><?=$row->sponsor_name?></p></a>
                                        <div class="sponser-img-wrap">
                                            <a href="<?=(($row->website_link!='')?$row->website_link:'javascript:void(0);')?>" target="_blank"><img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>"></a>
                                        </div>
                                    </div>
                                <?php $i++; } }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>