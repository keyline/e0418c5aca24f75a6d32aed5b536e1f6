<?php
if($row) {
    $event_id                       = $row->event_id;
    $image_title                    = $row->image_title;
    $image_file                     = $row->image_file;
    $image_description              = $row->image_description;
    $is_home_page                   = $row->is_home_page;
} else {
    $event_id                       = set_value('event_id', '');
    $image_title                    = set_value('image_title', '');
    $image_file                     = set_value('image_file', '');
    $image_description              = set_value('image_description', '');
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="image_title">Image Title</label>
                                        <input type="text" class="form-control" name="image_title" id="image_title" placeholder="Event Title" value="<?php echo $image_title; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="form-label">Is Show In Home Page</p>
                                        <input type="radio" name="is_home_page" id="is_home_page1" value="1" required="required" <?=(($is_home_page == 1)?'checked':'')?>> <label for="is_home_page1">YES</label>
                                        <input type="radio" name="is_home_page" id="is_home_page2" value="0" required="required" <?=(($is_home_page == 0)?'checked':'')?>> <label for="is_home_page2">NO</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="image_description">Image Description</label>
                                        <textarea class="form-control" name="image_description" id="image_description" placeholder="Image Description" required="required"><?php echo $image_description; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="image_file">Image Gallery Image</label>
                                        <div class="input-group mb-2">
                                          <?php if($image_file!='') { ?>
                                          <img src="<?php echo base_url();?>/uploads/gallery/<?php echo $image_file; ?>" class="img-responsive img-thumbnail" style="height:200px; width:300px;"  />
                                          <?php } ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Image Gallery Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image_file" name="image_file" <?php if($action == 'Add'){?>required<?php }?>>
                                                <label class="custom-file-label" for="image_file">Choose file</label>
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