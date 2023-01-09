<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-col">
                <div class="player">
                    <div class="player-bg-img">
                        <!-- <img src="<?=$ASSETS_URL?>images/details-bg.png" alt=""> -->
                        <iframe src="https://cdn.jwplayer.com/players/<?= $videos->media_code ?>-4Q2lEcj7.html" width="640" height="360" frameborder="0" scrolling="auto" title="<?= $videos->media_title ?>" allowfullscreen></iframe>
                    </div>
                    <div class="player-content card-content">
                        <div class="now-box upcoming-box">
                            <h5>UPCOMING</h5>
                        </div>
                        <h3><?= $videos->media_title ?></h3>
                        <div class="control-div">
                            <p>With <b><?= $videos->media_author ?></b></p>
                            <div class="button-sec">
                                <div class="join-button count-button">
                                    <i class="fas fa-stopwatch"></i>
                                    <p>Starts in <span> 4 Hrs : 08 Min : 08 Sec</span></p>
                                    <div class="color"></div>
                                </div>
                                <div class="share-btn">
                                    <i class="fas fa-share"></i>
                                    <span>Share</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-bottom-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bottom-img">
                                <img src="<?=base_url('/uploads/banners/'.$bottom_ads->advertisment_image)?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="play-box-head">
                                <h4>Recently Played</h4>
                                <ul>
                                    <li>
                                        <div class="play-box">
                                            <h4><span>Ep 6 |</span> Park Street Cemetry</h4>
                                            <p>Resume <i class="fas fa-play"></i></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="play-box">
                                            <h4><span>Ep 6 |</span> Park Street Cemetry</h4>
                                            <p>Resume <i class="fas fa-play"></i></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="play-box">
                                            <h4><span>Ep 6 |</span> Park Street Cemetry</h4>
                                            <p>Resume <i class="fas fa-play"></i></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="play-box">
                                            <h4><span>Ep 6 |</span> Park Street Cemetry</h4>
                                            <p>Resume <i class="fas fa-play"></i></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mid-img">
                    <img src="<?=base_url('/uploads/banners/'.$vertical_ads->advertisment_image)?>" alt="">
                </div>
            </div>
            <div class="col-md-4 right-col details-right-col">
                <div class="right-img">
                    <img src="<?=base_url('/uploads/banners/'.$right_ads->advertisment_image)?>" alt="">
                </div>
                <h3>All Episodes</h3>
                <ul>
                    <?php if ($allepisodes) {
                        foreach ($allepisodes as $allepisode) {  ?>
                        <li>
                            <div class="episode-box">
                                <div class="epi-write">
                                    <h4><?= $allepisode->media_title  ?></h4>
                                    <p><?php echo date("F j' y", strtotime($allepisode->media_publish_start_datetime)); ?></p>
                                </div>
                                <div class="epi-icon">
                                    <div class="round">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }
                        } ?>
                </ul>
                <button>LOAD MORE <i class="fas fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
</section>