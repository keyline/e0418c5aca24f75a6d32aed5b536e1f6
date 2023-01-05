<?php
if($row) {
    $event_id                       = $row->event_id;
    $video_title                    = $row->video_title;
    $video_code                     = $row->video_code;
    $video_link                     = $row->video_link;
    $video_description              = $row->video_description;
    $is_home_page                   = $row->is_home_page;
} else {
    $event_id                       = set_value('event_id', '');
    $video_title                    = set_value('video_title', '');
    $video_code                     = set_value('video_code', '');
    $video_link                     = set_value('video_link', '');
    $video_description              = set_value('video_description', '');
    $is_home_page                   = set_value('is_home_page', '');
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
                            <!-- <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5> -->
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/video_list/<?=$event->id?>">Manage <?php echo $moduleDetail['module']; ?> Gallery Video</a></li>
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
                        <?php if($session->getFlashdata('success_message')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <?php } ?>
                        <?php if($session->getFlashdata('error_message')) { ?>
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
                                        <label class="form-label" for="video_title">Video Title</label>
                                        <input type="text" class="form-control" name="video_title" id="video_title" placeholder="Event Title" value="<?php echo $video_title; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="video_link">Video Link</label>
                                        <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Event Link" value="<?php echo $video_link; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="form-label">Is Show In Home Page</p>
                                        <input type="radio" name="is_home_page" id="is_home_page1" value="1" required="required" <?=(($is_home_page == 1)?'checked':'')?>> <label for="is_home_page1">YES</label>
                                        <input type="radio" name="is_home_page" id="is_home_page2" value="0" required="required" <?=(($is_home_page == 0)?'checked':'')?>> <label for="is_home_page2">NO</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="video_description">Video Description</label>
                                        <textarea class="form-control" name="video_description" id="video_description" placeholder="Video Description" required="required"><?php echo $video_description; ?></textarea>
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