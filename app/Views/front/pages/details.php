<style type="text/css">
.my_centered_buttons { display: flex; justify-content: center; }
</style>
<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$showSkinsPath= base_url() . getenv('SHOW_SKINS');
?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="player" id="player">
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
                                <img src="<?=$showSkinsPath . $show_details->show_cover_image?>" alt="">
                            <?php }?>
                        </div>
                        <div class="player-content card-content">
                        <?php if ($currentdateTime < $media->media_publish_start_datetime) {  ?>
                    
                        <div class="now-box upcoming-box">
                            <h5>UPCOMING</h5>
                        </div>
                        <h3><?= $media->media_title ?></h3>
                        <div class="control-div">
                            <p>With <b><?= $media->media_author ?? 'Unknown' ?></b></p>
                            <div class="button-sec">
                                <div class="join-button count-button">
                                    <i class="fas fa-stopwatch"></i>
                                    <p>Starts in <span id="showcountdown"> 4 Hrs : 08 Min : 08 Sec</span></p>
                                    <div class="color"></div>
                                </div>
                                <div class="share-btn">
                                    <i class="fas fa-share"></i>
                                    <!-- <span>Share</span> -->
                                    <!-- <span><a href="<?php //echo base_url("social-icons/{$media->media_id}")?>" id="manual-ajax">Share</a></span> -->
                                    <span><a href="#social-share" rel="modal:open">Share</a></span>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="now-box live-box">
                            <h5>NOW LIVE</h5> <i class="fas fa-circle"></i>
                        </div>
                        <h3><?= $media->media_title ?></h3>
                        <div class="control-div">
                            <p>With <b><?= $media->media_author ?? 'Unknown' ?></b></p>
                            <div class="whenview_icon">
                                <!-- <span style="color:white" ><i class="fas fa-users"></i></i> 1.6K Viewing</span> -->
                                <div class="button-sec">
                                        <!-- <div class="join-button show-episode">                                            
                                            <p>Join Live <b>Now</b></p>
                                            <i class="fas fa-arrow-right"></i>
                                            <div class="color"></div>
                                        </div> -->
                                    <div class="share-btn">
                                        <i class="fas fa-share"></i>
                                        <!-- <span><a href="<?php // echo base_url("social-icons/{$media->media_id}")?>" id="manual-ajax">Share</a></span> -->
                                        <span><a href="#social-share" rel="modal:open">Share</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }   ?>
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
                <?php if ($allepisodes) { ?>
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
                                    <?php
                                    $showName       = '';
                            $show           = $common_model->find_data('abp_shows', 'row', ['id' => $allepisode->show_id]);
                            $showName       = (($show) ? $show->show_slug : '');
                            $episodeName    = $allepisode->media_slug;
                            ?>
                                    <a href="<?php echo base_url(); ?>/details/<?=$showName.'/'.$episodeName.'/'.$allepisode->media_id?>">
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
            <?php } ?>
        </div>
    </div>
</section>
<div id="social-share" class="modal">
    <!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style my_centered_buttons" data-a2a-url="" data-a2a-title="">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_linkedin"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div> -->
    <?php echo $social_share_ui;?>
</div>
<!-- Modal end -->
<!-- <div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0&appId=564063147297627&autoLogAppEvents=1" nonce="cfA5yla2"></script> -->
<!-- <div id="disqus_thread"></div> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jwplayer.com/libraries/c1QdRr9B.js"></script>
<!-- jquery count down plugin -->
<script type="text/javascript" src="<?=$ASSETS_URL?>/js/jquery.countdown.js"></script>
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

    (function(){
		var a = document.createElement('script');
		a.async = true;
		a.src = 'https://static.addtoany.com/menu/page.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(a, s);
	})();

    //Open modal in AJAX callback
    // $('#manual-ajax').click(function(event) {
    // event.preventDefault();
    // this.blur(); // Manually remove focus from clicked link.
    // $.get(this.href, function(html) {
    //     $(html).appendTo('body').modal();
    // });
    // });

    $("#showcountdown")
  .countdown("<?= $media->media_publish_start_datetime?>").on('update.countdown', function(event) {
  var $this = $(this).html(event.strftime(''
    + '<span>%-d</span> day%!d '
    + '<span>%H</span> hr '
    + '<span>%M</span> min '
    + '<span>%S</span> sec'));
});

</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>