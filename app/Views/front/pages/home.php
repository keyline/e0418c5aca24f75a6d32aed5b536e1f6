<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<section class="body-area">
    <div class="container-fluid">
        <div class="row body-row">
            <div class="col-lg-8">
                <!-- <div class="splide splide1" aria-label="Splide Basic HTML Example">
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
                </div> -->
                <div class="row card-row">
                    <div class="col-md-6">
                        <?php if ($currentDayPodcast) {?>
    						<div class="card-con">
                                <div class="card-img">
                                    <?php
                                    $showDTL = $common_model->find_data('abp_shows', 'row', ['id' => $currentDayPodcast->show_id]);
                            if ($showDTL) {
                                if ($showDTL->show_cover_image != '') {
                                    ?>
                                        <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL) ? $showDTL->show_title : '')?>"  />
                                    <?php }
                                }?>
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
                            <?php if($poll_options) {
                                foreach ($poll_options as $poll_option) { ?>
                                <div class="yes-div">
                                    <div class="percentage" style="--percent: 70%">
                                    </div>
                                    <?= $poll_option->poll_option ?>
                                </div>
                            <?php    }  } ?>
                            <a href="<?php echo base_url('poll-history')  ?>" class="result-div">Results</a>
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
                    <?php if ($latestPodcasts) {
                        foreach ($latestPodcasts as $latestPodcast) {  ?>
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
                            if ($showDTL) {
                                if ($showDTL->show_cover_image != '') {
                                    ?>
                                    <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL) ? $showDTL->show_title : '')?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:300px; height: 100px;"  />
                                <?php }
                                }?>
                            </div>
                        </div>
                    </li>
                    <?php }
                        }?>
                </ul>
                <button id="loadMore">LOAD MORE <i class="fas fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
    <!-- Display login status -->
    <div id="status"></div>
    <!-- Display user profile data -->
    <div id="userData"></div>
    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>
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


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>