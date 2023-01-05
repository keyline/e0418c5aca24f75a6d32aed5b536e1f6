<section id="home-banner">
    <div class="home-slider">
        <div class="banner-caption">
            <div class="infocom-banner-logo-wrapper">
                <img src="<?=base_url('/material/front/')?>/assets/images/infocom-logo-2022.jpg" alt="">
                <img src="<?=base_url('/material/front/')?>/assets/images/abp-intiative.jpg" alt="">
                <p><?=$event->event_date?> <?=$event->event_venue?></p>
            </div>
            <h2>Get Ready to Embrace the age of change makers. Get Ready to redefine leadership.</h2>
            <h3>India’s top Business, Technology and Leadership Conference is back!</h3>
            <a href="<?=base_url('event/infocom-calcutta-2022')?>" class="btn btn-default">Explore Event</a>
        </div>
        <a href="<?=base_url('event/infocom-calcutta-2022')?>" class="scroll">
            <div class="img-circle-wrapper">
                <div class="img-wrapper">
                    <img src="<?=base_url('/material/front/')?>/assets/icons/scroll.jpg" alt="" width="41" height="69">
                    <span>Scroll down</span>
                </div>
            </div>
        </a>
        <div class="home-banner-slider">
            <?php if($banners){ foreach($banners as $banner){?>
            <img src="<?=base_url('/uploads/banners/'.$banner->banner_image)?>" alt="<?=$banner->small_text?>" width="1920" height="810">
            <?php } }?>
        </div>
    </div>
</section>
<section id="home-intro" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-6">
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
                        <?=$staticPage->description?>
                        <div class="home-intro-hero">
                            <!-- <div class="home-intro-hero-imgs">
                                <img src="<?=base_url('/material/front/')?>/assets/images/abp-logo.jpg" alt="" width="" height="">
                                <a href="#!" target="_blank">www.abp.in</a>
                            </div> -->
                            <!-- <div>
                                Founded in 1922, the ABP Group is one of the foremost media conglomerates in
                                India having 11 premier publications, three 24-hour national TV news channels, a
                                leading book publishing business as well as various mobile and internet
                                properties. ABP’s portfolio covers a gamut of genres and encompasses premium
                                brands like — Anandabazar Patrika, The Telegraph, Fortune India, Ebela, ABP
                                News, ABP Ananda, ABP Majha and many more…
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?=base_url('/material/front/')?>/assets/images/intro-thumb.jpg" alt="" width="566" height="362">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="speakers" class="section-padding grey">
    <div class="container">
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
                </div>
            </div>
            <?php } }?>
        </div>
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
                    <li role="presentation" class="active"><a href="#video" aria-controls="video" role="tab"
                            data-toggle="tab">Video</a></li>
                    <li role="presentation"><a href="#image" aria-controls="image" role="tab"
                            data-toggle="tab">Image</a></li>
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
            <div class="col-lg-12">
                <!-- <img src="<?=base_url('/material/front/')?>/assets/images/ad-1.jpg" alt=""> -->
                <img src="<?=base_url('/material/front/')?>/assets/images/ad-2.jpg" alt="" class="mobile">
            </div>
        </div>
    </div>
</section>
<section id="sponsers" class="section-padding grey">
    <div class="container">
        <div class="title-wrap">
            <h2>
                SPONSORS
                <small>@ INFOCOM CALCUTTA <?=date('Y')?></small>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blue sponser-block">
                            <h4>HOST STATE</h4>
                            <div class="sponser-carousel">
                                <?php if($sponsors1){ $i=1; foreach($sponsors1 as $row){?>
                                <div class="sponser-img-wrap">
                                    <img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>">
                                </div>
                                <?php $i++; } }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="red sponser-block">
                            <h4>GOLD SPONSORS</h4>
                            <div class="sponser-carousel">
                                <?php if($sponsors2){ $i=1; foreach($sponsors2 as $row){?>
                                <div class="sponser-img-wrap">
                                    <img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>">
                                </div>
                                <?php $i++; } }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="green sponser-block">
                            <h4>SPONSORS</h4>
                            <div class="sponser-carousel">
                                <?php if($sponsors3){ $i=1; foreach($sponsors3 as $row){?>
                                <div class="sponser-img-wrap">
                                    <img src="<?=base_url('/uploads/sponsors/'.$row->sponsor_logo)?>" alt="<?=$row->sponsor_name?>">
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