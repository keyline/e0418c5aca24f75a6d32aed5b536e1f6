<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<section class="body-area">
    <div class="container-fluid">
        <div class="row body-row">
            <div class="col-lg-8">                
                <div class="row card-row">
                    <div class="col-md-6" id="currentWeekShow">
                        <?php if ($currentDayPodcast) {?>
                            <?php $media_publish_start_datetime = $currentDayPodcast->media_publish_start_datetime;?>
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
                                        <?php if ($currentdateTime >= $media_publish_start_datetime) {?>
                                            <h5>NOW LIVE</h5> <i class="fas fa-circle"></i>
                                        <?php } else {?>
                                            <h5>SCHEDULED</h5>
                                        <?php }?>   
                                    </div>
                                    <h3><a href="<?=base_url('/details/'.encoded($currentDayPodcast->media_id))?>"><?=$currentDayPodcast->media_title?></a></h3>
                                    <p>With <b><?=$currentDayPodcast->media_author?></b></p>
                                    <div class="button-sec">
                                        <?php if ($currentdateTime >= $media_publish_start_datetime) {?>
                                            <div class="join-button show-episode" data-episoderef="<?=encoded($currentDayPodcast->media_id);?>">                                            
                                                <p>Join Live <b>Now</b></p>
                                                <i class="fas fa-arrow-right"></i>
                                                <div class="color"></div>
                                            </div>
                                        <?php } else {?>
                                            <div class="join-button count-button">
                                                <i class="fas fa-stopwatch"></i>
                                                <span id="media_publish_start_datetime_current_week" style="display:none;"><?=date_format(date_create($media_publish_start_datetime), "M d, Y H:i:s")?></span>
                                                <p>Starts in <span id="currentWeekCountdown"></span></p>
                                                <div class="color"></div>
                                            </div>
                                        <?php }?>
                                        <div class="share-btn">
                                            <i class="fas fa-share"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="card-con">
                                <div class="card-img">
                                    <img src="<?=base_url('/uploads/show/no-show.jpg')?>" alt="no-show"  />
                                </div>
                            </div>
                            <?php }?>
                        <div class="dash hd-dash"></div>
                    </div>
                    <div class="col-md-6" id="nextWeekShow">
                        <?php if ($currentDayNextWeekPodcast) {?>
                            <?php $media_publish_start_datetime = $currentDayNextWeekPodcast->media_publish_start_datetime;?>
                            <div class="card-con">
                                <div class="card-img">
                                    <?php
                                $showDTL = $common_model->find_data('abp_shows', 'row', ['id' => $currentDayNextWeekPodcast->show_id]);
                            if ($showDTL) {
                                if ($showDTL->show_cover_image != '') {
                                    ?>
                                        <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL) ? $showDTL->show_title : '')?>"  />
                                    <?php }
                                }?>
                                </div>
                                <div class="card-content">
                                    <div class="now-box upcoming-box">
                                        <h5>UPCOMING</h5>
                                    </div>
                                    <h3><a href="<?=base_url('/details/'.encoded($currentDayNextWeekPodcast->media_id))?>"><?=$currentDayNextWeekPodcast->media_title?></a></h3>
                                    <p>With <b><?=$currentDayNextWeekPodcast->media_author?></b></p>
                                    <div class="button-sec">
                                        <div class="join-button count-button">
                                            <i class="fas fa-stopwatch"></i>
                                            <span id="media_publish_start_datetime_next_week" style="display:none;"><?=date_format(date_create($media_publish_start_datetime), "M d, Y H:i:s")?></span>
                                            <p>Starts in <span id="nextWeekCountdown"></span></p>
                                            <div class="color"></div>
                                        </div>
                                        <div class="share-btn">
                                            <i class="fas fa-share"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="card-con">
                                <div class="card-img">
                                    <img src="<?=base_url('/uploads/show/no-show.jpg')?>" alt="no-show"  />
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <div class="dash"></div>
                
                <!-- for poll section -->
                <?php if ($poll_question) {    ?>
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
                <?php } ?>
                <!-- for poll section -->

                <!-- for Quiz section -->
                <?php if ($quiz_options) {    ?>
                    <div class="row bottom-row">
                        <div class="col-md-6 vote-col" align="center">
                            <?php if ($quiz_options->question_type == 'video') { ?>
                                <iframe width="250" height="200" src="https://www.youtube.com/embed/<?php echo $quiz_options->abp_video_code ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php   }  ?>
                            <?php if ($quiz_options->question_type == 'image') {   ?>
                                <img src="<?=base_url('/uploads/quizeImage/'.$quiz_options->question_attachment_title)?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                            <?php } ?>
                            <h3><?php echo $quiz_options->quiz_description_txt;  ?></h3>
                            <form action="" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="mode" value="updateleadstatus">
                                <div class="vote-div">
                                    <?php if ($quiz_choices) {
                                        $i=1;
                                        foreach ($quiz_choices as $quiz_choice) { ?>
                                        <label for="chkTxt"><input type="radio" id="choice" name="choice" value="<?= $quiz_choice->choice_id ?>" /> <?= $quiz_choice->choice_description ?> </label>
                                        <input type="hidden" name="question" value="<?php echo $quiz_options->question_id ?>">
                                        <input type="hidden" name="rightChoice" id="rightChoice" value="<?php echo $quiz_choice->choice_id ?>">
                                    <?php }
                                        } ?>
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                        <a href="<?php echo base_url('thank-you')  ?>" class="result-div">Results</a>
                                </div>
                            </form>
                            <div class="right-dash"></div>
                            <div class="dash hd-dash"></div>
                        </div>
                        
                        <div class="col-md-6" align="center">
                            <div class="bottom-img">
                                <img src="<?=base_url('/uploads/banners/'.$bottom_ads->advertisment_image)?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- for Quiz section -->

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
                                <a href="<?php echo base_url(); ?>/details/<?php echo encoded($latestPodcast->media_id) ?>">PLAY NOW<i class="fas fa-play-circle"></i></a>
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
    <!-- <div id="status"></div> -->
    <!-- Display user profile data -->
    <!-- <div id="userData"></div> -->
    <!-- Show the user profile details -->
    <div class="userContent" style="display: none;"></div>
    <!-- <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button> -->
</section>
</section>

<!-- Main modal -->
<!-- Normal link -->
<!-- <a href="<?php //echo base_url('Social_login/showSocialButtons');?>" id="manual-ajax">second example</a> -->
<!-- Modal HTML embedded directly into document -->
<div id="socialbtn-modal" class="modal">
  <!-- <p>Thanks for clicking. That felt good.</p> -->
  <h3>Login with your account</h3>
  <div class="logininner">
    <div class="logiinicon-box">
            <a href="javascript:void(0)" onclick="fbLogin()" id="fbloginbutton" class="nav-link"> <i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
    <div id="gConnectBtn"></div>
  </div>
</div>

<!-- Link to open the modal -->
<!-- <p><a href="#ex1" rel="modal:open">Open Modal</a></p> -->