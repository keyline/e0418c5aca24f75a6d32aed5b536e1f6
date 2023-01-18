<?php //pr($row);die;
if ($row) {
    $question_id                  = $row->question_id;
    $question_type                = $row->question_type;
    $question_quiz_id             = $row->question_quiz_id;
    $quiz_description_txt         = $row->quiz_description_txt;
    $question_attachment_title    = $row->question_attachment_title;
    $abp_video_link               = $row->abp_video_link;
    $abp_video_code               = $row->abp_video_code;
} else {
    $question_id                  = set_value('question_id', '');
    $question_type                = set_value('question_type', '');
    $quiz_description_txt         = set_value('quiz_description_txt', '');
    $question_quiz_id             = set_value('question_quiz_id', '');
    $question_attachment_title    = set_value('question_attachment_title', '');
    $abp_video_link               = set_value('abp_video_link', '');
    $abp_video_code               = set_value('abp_video_code', '');
}
?>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $page_header; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                        <div class="card-header">
                            <h5><?php echo $page_header; ?></h5>
                            <?php if ($session->getFlashdata('success_message')) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <?php } ?>
                            <?php if ($session->getFlashdata('error_message')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="blog_category">Quiz Category </label>
                                                    <select class="js-example-basic-single form-control" id="quize_title" name="quize_title" required="required">
                                                        <option value="" selected="selected">Select Quiz Category</option>
                                                            <?php
                                                            if ($titles) {
                                                                $i=1;
                                                                foreach ($titles as $title) {?>
                                                        <option value="<?=$title->quiz_id; ?>"<?php if ($question_quiz_id==$title->quiz_id) { ?> selected="selected"<?php } ?>><?=$title->quiz_title;?></option>
                                                        <?php  }
                                                            } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Quiz Type : </label>
                                                    <label for="chkTxt"><input type="radio" id="chkTxt" <?php if ($question_type=='text') { ?> checked <?php } ?> name="type" value="text" onclick="ShowHideDiv()" /> TEXT </label>
                                                    <label for="chkImg"><input type="radio" id="chkImg" <?php if ($question_type=='image') { ?> checked <?php } ?> name="type" value="image" onclick="ShowHideDiv()" /> IMAGE </label>
                                                    <label for="chkVideo"><input type="radio" id="chkVideo" <?php if ($question_type=='video') { ?> checked <?php } ?> name="type" value="video" onclick="ShowHideDiv()" /> VIDEO </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Quiz Description</label>
                                                    <textarea class="form-control" name="quize_description" id="quize_description" placeholder="Description" required="required"><?php echo $quiz_description_txt; ?></textarea>
                                                </div>
                                            </div>                              
                                            <div class="col-md-12">
                                                <div class="form-group">      
                                                    <div id="divImg" style="display: none">
                                                        <div class="input-group mb-2">
                                                            <?php if ($question_attachment_title!='') { ?>
                                                                <img src="<?php echo base_url();?>/uploads/quizeImage/<?php echo $question_attachment_title; ?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                                                            <?php } ?>
                                                        </div>
                                                        <span style="color: red;" >* image size must be 800x800 *</span><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Quiz Image</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="quize_image" name="quize_image">
                                                                <label class="custom-file-label" for="quize_image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div id="divVideo" style="display: none">
                                                        <label class="form-label" for="name">Video Link</label>
                                                        <?php if ($action == 'Edit') {    ?>
                                                                <div style="position:relative; overflow:hidden; padding-bottom:56.25%">
                                                                    <iframe src="https://cdn.jwplayer.com/players/<?php echo $abp_video_code ?>-<?=$site_setting->jwplayer_player_id?>.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="<?=$quiz_description_txt?>" style="position:absolute;" allowfullscreen></iframe>
                                                                </div>
                                                        <?php }?>
                                                        <input type="text" class="form-control" name="quize_video" id="quize_video" placeholder="JW player Ùnique Code" value="<?php  echo $abp_video_link; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="description">Quiz Options</label>
                                                <div class="field_wrapper">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" name="function_name[]" placeholder="Quiz Answer">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select class="form-control" name="choice_is_right[]">
                                                                <option value="" selected>Select Quiz Right Option</option>
                                                                <option value="1">YES</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                                                <i class="fa fa-plus-circle fa-2x text-success"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                <button type="submit" class="btn  btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // alert();
        var maxField = 4;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML = '<div class="row mt-3">\
                            <div class="col-md-5">\
                                <input type="text" class="form-control" name="function_name[]" placeholder="Quiz Answer">\
                            </div>\
                            <div class="col-md-5">\
                                <select class="form-control" name="choice_is_right[]">\
                                    <option value="" selected>Select Quiz Right Option</option>\
                                    <option value="1">YES</option>\
                                    <option value="0">NO</option>\
                                </select>\
                            </div>\
                            <div class="col-md-2">\
                                <a href="javascript:void(0);" class="remove_button" title="Add field">\
                                    <i class="fa fa-minus-circle fa-2x text-danger"></i>\
                                </a>\
                            </div>\
                        </div>';
        var x = 1;
        
        $(addButton).click(function(){
            if(x < maxField){
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>

<script>
    function ShowHideDiv() {

        // var chkTxt = document.getElementById("chkTxt");
        var chkImg = document.getElementById("chkImg");
        var chkVideo = document.getElementById("chkVideo");

        // var divtext = document.getElementById("divtext");
        var divImg = document.getElementById("divImg");
        var divVideo = document.getElementById("divVideo");

        // divtext.style.display = chkTxt.checked ? "block" : "none";
        divImg.style.display = chkImg.checked ? "block" : "none";
        divVideo.style.display = chkVideo.checked ? "block" : "none";
    }
</script>