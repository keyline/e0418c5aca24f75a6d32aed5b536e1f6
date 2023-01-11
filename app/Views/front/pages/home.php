<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<section class="body-area">
    <div class="container-fluid">
        <div class="row body-row">
            <div class="col-lg-8">
                <div class="splide splide1" aria-label="Splide Basic HTML Example">
                    <div class="week splide__track">
                        <ul class="splide__list day-list">
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">MONDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">TUESDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">WEDNESDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">THURSDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">FRIDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">SATURDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">SUNDAY</div>
                                    </a>
                                </div>
                            </li>
                        </ul>                                
                    </div>
                </div>
                <div class="row card-row">
                    <div class="col-md-6">
                        <?php if($currentDayPodcast){?>
    						<div class="card-con">
                                <div class="card-img">
                                    <?php 
                                    $showDTL = $common_model->find_data('abp_shows', 'row', ['id' => $currentDayPodcast->show_id]);
                                    if ($showDTL) { if($showDTL->show_cover_image != '') {
                                    ?>
                                        <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL)?$showDTL->show_title:'')?>" style="height:480px;" />
                                    <?php } }?>
                                </div>
                                <div class="card-content">
                                    <div class="now-box">
                                        <h5>NOW LIVE</h5> <i class="fas fa-circle"></i>
                                    </div>
                                    <h3><?=$currentDayPodcast->media_title?></h3>
                                    <p>With <b><?=$currentDayPodcast->media_author?></b></p>
                                    <div class="button-sec">
                                        <div class="join-button">
                                            <p>Join Live <b>Now</b></p>
                                            <i class="fas fa-arrow-right"></i>
                                            <div class="color"></div>
                                        </div>
                                        <div class="share-btn">
                                            <i class="fas fa-share"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <div class="dash hd-dash"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-con card-con-red">
                            <div class="card-img">
                                <img src="<?=$ASSETS_URL?>images/card-img.png" alt="">
                            </div>
                            <div class="card-content">
                                <div class="now-box upcoming-box">
                                    <h5>UPCOMING</h5>
                                </div>
                                <h3>Ep 6 <span>|</span> Chuchu The Shoe Boy</h3>
                                <p>With <b>Priyanka</b></p>
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
                </div>
                <div class="dash"></div>
                <div class="row bottom-row">
                    <div class="col-md-6 vote-col" align="center">
                        <h3><?= $poll_question->poll_title; ?></h3>
                        <div class="vote-div">
                            <?php if ($poll_options) {
                                foreach ($poll_options as $poll_option) { ?>
                                <div class="yes-div">
                                    <div class="percentage" style="--percent: 70%">
                                    </div>
                                    <?= $poll_option->poll_option ?>
                                </div>
                            <?php    }
                            } ?>
                            <div class="result-div">
                                Results
                            </div>
                        </div>
                        <div class="right-dash"></div>
                        <div class="dash hd-dash"></div>
                    </div>
                    
                    <div class="col-md-6" align="center">
                        <div class="bottom-img">
                            <img src="<?=base_url('/uploads/banners/'.$bottom_ads->advertisment_image)?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-col" align="center">
                <div class="right-img">
                    <img src="<?=base_url('/uploads/banners/'.$right_ads->advertisment_image)?>" alt="">
                </div>
                <h3>Latest Podcasts</h3>
                <ul>
                    <?php if ($latestPodcasts) { foreach ($latestPodcasts as $latestPodcast) {  ?>
                    <li class="content">
                        <div class="list-box">
                            <div class="list-content">
                                <h3><?= $latestPodcast->media_title  ?></h3>
                                <p><?php echo date("F j' y", strtotime($latestPodcast->media_publish_start_datetime)); ?></p>
                                <!-- <button>PLAY NOW <i class="fas fa-play-circle"></i></button> -->
                                <a href="<?php echo base_url(); ?>/details/<?php echo $latestPodcast->media_id ?>">PLAY NOW<i class="fas fa-play-circle"></i></a>
                            </div>
                            <div class="list-img">
                                <?php 
                                $showDTL = $common_model->find_data('abp_shows', 'row', ['id' => $latestPodcast->show_id]);
                                if ($showDTL) { if($showDTL->show_cover_image != '') {
                                ?>
                                    <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL)?$showDTL->show_title:'')?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:300px; height: 100px;"  />
                                <?php } }?>
                            </div>
                        </div>
                    </li>
                    <?php } }?>
                </ul>
                <button id="loadMore">LOAD MORE <i class="fas fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
    <!-- Display login status -->
    <div id="status"></div>
    <!-- Display user profile data -->
    <div id="userData"></div>
</section>
</section>

<script>
// Set the date we're counting down to
var countDownDate = new Date("2023-02-04 18:30:00").getTime();

// Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>
