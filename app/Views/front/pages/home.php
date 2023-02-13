<style type="text/css">
.my_centered_buttons { display: flex; justify-content: center; }
</style>
<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
$currentdateTime = date('Y-m-d H:i:s');
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
                                    <?php
                                $showName = '';
                            $show = $common_model->find_data('abp_shows', 'row', ['id' => $currentDayPodcast->show_id]);
                            $showName = (($show) ? $show->show_slug : '');
                            $episodeName = $currentDayPodcast->media_slug;
                            ?>
                                    <h3><a href="<?=base_url('/details/'.$showName.'/'.$episodeName.'/'.$currentDayPodcast->media_id)?>"><?=$currentDayPodcast->media_title?></a></h3>
                                    <p>With <b><?=$currentDayPodcast->media_author?></b></p>
                                    <div class="button-sec">
                                        <?php if ($currentdateTime >= $media_publish_start_datetime) {?>
                                            <div class="join-button show-episode" data-episoderef="<?=$showName.'/'.$episodeName.'/'.$currentDayPodcast->media_id;?>">                                            
                                                <p>Join Live <b>Now</b></p>
                                                <i class="fas fa-arrow-right"></i>
                                                <div class="color"></div>
                                            </div>
                                        <?php } else {?>
                                            <div class="join-button count-button">
                                                <i class="fas fa-stopwatch"></i>
                                                <p>Starts in <span id="currentWeekCountdown"></span></p>
                                                <span id="media_publish_start_datetime_current_week" style="display:none;"><?=date_format(date_create($media_publish_start_datetime), "M d, Y H:i:s")?></span>
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
                                    <img src="<?=base_url('/uploads/show/no-show.jpg')?>" alt="no-show" class="no-show" />
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
                                    <?php
                                    $showName = '';
                            $show = $common_model->find_data('abp_shows', 'row', ['id' => $currentDayNextWeekPodcast->show_id]);
                            $showName = (($show) ? $show->show_slug : '');
                            $episodeName = $currentDayNextWeekPodcast->media_slug;
                            ?>
                                    <h3><a href="<?=base_url('/details/'.$showName.'/'.$episodeName.'/'.$currentDayNextWeekPodcast->media_id)?>"><?=$currentDayNextWeekPodcast->media_title?></a></h3>
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
                                    <img src="<?=base_url('/uploads/show/no-show.jpg')?>" alt="no-show" class="no-show" />
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <div class="dash"></div>
                
                <!-- for poll section -->                
                    <div class="row bottom-row">
                        <?php if ($poll_question) {    ?>
                            <div class="col-md-6 vote-col" align="center">
                                <h3><?= $poll_question->poll_title; ?></h3>
                                <div class="vote-div">
                                    <?php if ($poll_options) {
                                        foreach ($poll_options as $poll_option) { ?>
                                        <!-- <button class="btn" id="<?= $poll_option->id ?>" name="<?= $poll_option->poll_option ?>" value="btn" >
                                            <?= $poll_option->poll_option ?>
                                        </button> -->
                                        <div class="yes-div">
                                            <div class="percentage" style="--percent: 50%">
                                            </div>
                                            <button class="btn-poll" data-id="<?= $poll_option->id ?>" data-qtype= "<?= $poll_option->type ?>" data-otype= "<?= $poll_question->id ?>"  >
                                                <?= $poll_option->poll_option ?>
                                            </button>
                                        </div>
                                    <?php    }
                                    } ?>
                                    <?php if ($poll_count_tracking > 0) {  ?>
                                        <a href="<?php echo base_url('poll-history')  ?>" class="result-div">Results</a>
                                    <?php }  ?>
                                </div>
                                    
                                <div class="right-dash"></div>
                                <div class="dash hd-dash"></div>
                            </div>
                        <?php } ?>

                        <?php if ($quiz_options) {
                            if ($poll_count) {
                            } else { ?>
                                    <div class="col-md-6 vote-col" align="center">
                                        <?php if ($quiz_options->question_type == 'video') { ?>
                                            <div style="position:relative; overflow:hidden; padding-bottom:56.25%">
                                                <iframe src="https://cdn.jwplayer.com/players/<?php echo $quiz_options->abp_video_code ?>-<?=$site_setting->jwplayer_player_id?>.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="<?=$quiz_options->quiz_description_txt?>" style="position:absolute;" allowfullscreen></iframe>
                                            </div>
                                        <?php   }  ?>
                                        <?php if ($quiz_options->question_type == 'image') {   ?>
                                            <img src="<?=base_url('/uploads/quizeImage/'.$quiz_options->question_attachment_title)?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                                        <?php } ?>
                                        <div>
                                            <h3 style="color:#fca128;font-size: 25px; margin-bottom: 20px;" ><?php echo $quiz_options->quiz_description_txt;  ?></h3>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data" >
                                            <input type="hidden" name="mode" value="updateleadstatus">
                                            <!-- <div class="vote-div"> -->
                                                <div style="display: flex; justify-content: center;">
                                                <?php if ($quiz_choices) {
                                                    $i=1;
                                                    foreach ($quiz_choices as $quiz_choice) { ?>
                                                    <div style="color: white;">
                                                        <label for="choice" class="option"><input type="radio" id="choice" name="choice" value="<?= $quiz_choice->choice_id ?>" /> <?= $quiz_choice->choice_description ?> </label>
                                                    </div>
                                                    <input type="hidden" name="question" value="<?php echo $quiz_options->question_id ?>">
                                                    <input type="hidden" name="rightChoice" id="rightChoice" value="<?php echo $quiz_choice->choice_id ?>">
                                                <?php }
                                                    } ?>

                                                </div>
                                                
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <button type="submit" class="quiz-submit-div">Submit</button>
                                                    <a href="<?php echo base_url('thank-you')  ?>" class="quiz-result-div">Results</a>
                                                </div>
                                            <!-- </div> -->
                                        </form>
                                        <div class="right-dash"></div>
                                        <div class="dash hd-dash"></div>
                                    </div>
                            <?php }  ?>
                        <?php } ?>
                        
                        <?php if($bottom_ads){  ?>
                            <div class="col-md-6" align="center">
                                <div class="bottom-img">
                                    <a href="<?= $bottom_ads->url_link ?>" target="_blank"><img src="<?=base_url('/uploads/banners/'.$bottom_ads->advertisment_image)?>" alt="<?= $bottom_ads->heading ?>"></a>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>                
                <!-- for poll section --> 
            </div>
            <div class="col-lg-4 right-col" align="center">
                <?php if($right_ads){ ?>
                    <div class="right-img">  
                        <a href="<?= $right_ads->url_link ?>" target="_blank"><img src="<?=base_url('/uploads/banners/'.$right_ads->advertisment_image)?>" alt="<?= $right_ads->heading ?>"></a>
                    </div>
                <?php } ?>
                <h3>Latest Podcasts</h3>
                <ul>                    
                    <?php if ($latestPodcasts) {
                        foreach ($latestPodcasts as $latestPodcast) {  ?>
                    <li class="content">
                        <div class="list-box">
                            <div class="list-content">
                                <h3><?= $latestPodcast->media_title?></h3>
                                <p><?php echo date("F j' y", strtotime($latestPodcast->media_publish_start_datetime)); ?></p>
                                <!-- <button>PLAY NOW <i class="fas fa-play-circle"></i></button> -->
                                <?php
                                $showName = '';
                            $show = $common_model->find_data('abp_shows', 'row', ['id' => $latestPodcast->show_id]);
                            $showName = (($show) ? $show->show_slug : '');
                            $episodeName = $latestPodcast->media_slug;
                            ?>
                                <a href="<?php echo base_url(); ?>/details/<?=$showName?>/<?=$episodeName?>/<?=$latestPodcast->media_id?>">PLAY NOW<i class="fas fa-play-circle"></i></a>
                            </div>
                            <div class="list-img">
                                <?php
                            $showDTL = $common_model->find_data('abp_shows', 'row', ['id' => $latestPodcast->show_id]);
                            if ($showDTL) {
                                if ($showDTL->show_cover_image != '') {
                                    ?>
                                    <!-- <img src="<?php //base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?php //(($showDTL) ? $showDTL->show_title : '')?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:300px; height: 100px;"  /> -->
                                        <?php }
                                }
                            ?>
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
        <!-- if gsi client library commented on localhost then comment below div -->
    <div id="gConnectBtn"></div>
  </div>
</div>

<div id="social-share" class="modal">
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style my_centered_buttons" data-a2a-url="" data-a2a-title="Example Page">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_linkedin"></a>
    <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
    $(document).ready(function(){
            $('.vote-div').on('click', '.btn-poll', function(e){
            // debugger;
            let type= $(this).data('qtype');
            let pollquestion = $(this).data('otype');
            let polloption= $(this).data('id');
            let userid= 1;
            $.post({
                url: '<?= base_url('poll_answer') ?>',
                type: "POST",
                dataType: "json",
                data:{type:type , poll_id:pollquestion , poll_option_id:polloption , userId:userid },
                success: function (data) {
                    console.log(data);
                }
            });
        });
    });

    
</script>
<script>
	// Load AddToAny script asynchronously
    $(document).on('click', '.share-btn', function(e){
        $('#social-share').modal(
            {
                closeExisting: false
            }
        );

    });
	(function(){
		var a = document.createElement('script');
		a.async = true;
		a.src = 'https://static.addtoany.com/menu/page.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(a, s);
	})();
	</script>
