<?php //pr($row);
if ($row) {
    $media_title                = $row->media_title;
// $poll_option               = $row->poll_option;
} else {
    $media_title                = set_value('media_title', '');
    // $poll_option               = set_value('poll_option', '');
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
                                    <label class="form-label" for="small_text">Media Title</label>
                                    <input type="text" class="form-control" name="media_title" id="media_title" placeholder="Enter Media Title" value="<?php echo $media_title ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Code (Form JW Player)</label>
                                    <input type="text" class="form-control" name="media_code" id="media_code" placeholder="Enter Media Ùnique Code" value="<?php echo $media_code ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Description</label>
                                    <!-- <input type="text" class="form-control" name="media_desc" id="media_desc" placeholder="Enter Media Description" value="<?php echo $media_description ?? ''; ?>" required="required"> -->
                                    <textarea class="form-control ckeditor" name="media_desc" id="media_desc" placeholder="Description" required="required"><?php echo $media_description ?? ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Thumbnail</label>
                                    <?php if (isset($media_placeholder_image_txt) && trim($media_placeholder_image_txt)!== '') {?>
                                        <span><?php echo 'PATH' . $media_placeholder_image_txt ?? 'default_placeholder_image'?></span>
                                     <?php } else {?>   
                                    <input type="file" class="form-control" name="client_logo" id="client_logo" placeholder="Add Media Thumbnail" required="required">
                                    <?php } ?>
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
