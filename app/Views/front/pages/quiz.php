<?php use App\Models\CommonModel;   ?>
<div class="myDiv" >
      <div class="bg-primary text-white p-5 text-center">
        <h1>Quize Section</h1>
        <p>Perticipate our quize section panel !!!</p>
      </div>
  <style>
    .myDiv {
      border: 5px outset red;
      background-color: lightblue;
    }
  </style>

    <div class="container-fluid">
      <?php if($questions) { $i=1; foreach($questions as $question) { ?>
        <div class="row" >
          <form action="" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="question" value="<?php echo $question->question_id ?>">
              <div class="col-sm-4">
              <h2><?= $question->quiz_description_txt ?></h2>
              <?php if($question->question_type == 'video' ){ ?>
                  <iframe width="250" height="200" src="https://www.youtube.com/embed/<?php echo $question->abp_video_code ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php   } ?>
              <?php if($question->question_type == 'image' ){ ?>
                  <img src="<?=base_url('/uploads/quizeImage/'.$question->question_attachment_title)?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
              <?php   } ?>
              <p>
              <?php                                   
              $model = new CommonModel();
              $titles = $model->find_data('abp_quiz_question_choices', 'array', ['question_active!=' => 3 , 'choice_question_id='=> $question->question_id ], '', '', '');    ?>
              <?php //pr($titles);
              if($titles) { $i=1; foreach($titles as $title) { 
              ?>
              <label for="chkTxt"><input type="radio" id="choice" name="choice" value="<?= $title->choice_id ?>" onclick="ShowHideDiv()" /> <?= $title->choice_description ?> </label>
              <input type="hidden" name="rightChoice" id="rightChoice" value="<?php echo $title->choice_id ?>">
              <?php } } ?>
              </p>
              <button type="submit" class="btn  btn-primary">Submit</button>
              </div>
          </form>
        </div>
      <?php } } ?>
    </div>
</div>
