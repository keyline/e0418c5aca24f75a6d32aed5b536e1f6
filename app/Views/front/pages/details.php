<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="player">
                    <div class="player-bg-img">
                        <!-- <img src="<?=$ASSETS_URL?>images/details-bg.png" alt=""> -->
                        <!-- <iframe src="https://cdn.jwplayer.com/players/<?= $media->media_code ?>-4Q2lEcj7.html" width="100%" height="400" frameborder="0" scrolling="auto" title="<?= $media->media_title ?>" allowfullscreen></iframe> -->

                            <!-- <div style="position:relative; overflow:hidden; padding-bottom:56.25%"><iframe src="https://cdn.jwplayer.com/players/<?= $media->media_code ?>-8vAGGg58.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="<?= $media->media_title ?>" style="position:absolute;" allowfullscreen></iframe></div> -->

                            <!-- <div style="position:relative; overflow:hidden; padding-bottom:56.25%">
                                <iframe src="https://cdn.jwplayer.com/players/<?=$media->media_code?>-<?=$site_setting->jwplayer_player_id?>.html?sig=59dbb13b256cc9e088c6aa90dc227ed9&exp=1673621896" width="100%" height="100%" frameborder="0" scrolling="auto" title="<?=$media->media_title?>" style="position:absolute;" allowfullscreen></iframe>
                            </div> -->
                            <?php if ($currentdateTime >= $media->media_publish_start_datetime) {?>        
                            <div style="position:relative; overflow:hidden; padding-bottom:56.25%">
                                <iframe src="https://cdn.jwplayer.com/players/<?=$media->media_code?>-<?=$site_setting->jwplayer_player_id?>.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="<?=$media->media_title?>" style="position:absolute;" allowfullscreen></iframe>
                            </div>
                            <?php } else {?>
                                <img src="<?=$ASSETS_URL?>images/details-bg.png" alt="">
                                <?php }?>
                        </div>
                    <div class="player-content card-content">
                        <div class="now-box upcoming-box">
                            <h5>UPCOMING</h5>
                        </div>
                        <h3><?= $media->media_title ?></h3>
                        <div class="control-div">
                            <p>With <b><?= $media->media_author ?? 'Unknown' ?></b></p>
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
                        <div class="col-md-6" id="user_comment">
                            <div id="disqus_thread"></div>
                            <!-- <div class="fb-comments" data-href="https://abp-podcast.test/#user_comment" data-width="580" data-numposts="20"></div> -->
                            <!-- <div class="bottom-img">
                                <img src="<?=base_url('/uploads/banners/'.$bottom_ads->advertisment_image)?>" alt="">
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <!-- <div class="play-box-head">
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
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mid-img">
                    <img src="<?=base_url('/uploads/banners/'.$vertical_ads->advertisment_image)?>" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-10 right-col details-right-col">
                <div class="right-img">
                    <img src="<?=base_url('/uploads/banners/'.$right_ads->advertisment_image)?>" alt="">
                </div>
                <h3>All Episodes</h3>
                <ul>
                    <?php if ($allepisodes) {
                        foreach ($allepisodes as $allepisode) {  ?>
                        <li class="content">
                            <div class="episode-box">
                                <div class="epi-write">
                                    <h4><?= $allepisode->media_title  ?></h4>
                                    <p><?php echo date("F j' y", strtotime($allepisode->media_publish_start_datetime)); ?></p>
                                </div>
                                <div class="epi-icon">
                                    <a href="<?php echo base_url(); ?>/details/<?php echo encoded($allepisode->media_id) ?>">
                                        <div class="round">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php }
                        } ?>
                </ul>
                <button id="loadMore">LOAD MORE <i class="fas fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
</section>
<!-- <div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0&appId=564063147297627&autoLogAppEvents=1" nonce="cfA5yla2"></script> -->
<!-- <div id="disqus_thread"></div> -->
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://keylpodcast.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>