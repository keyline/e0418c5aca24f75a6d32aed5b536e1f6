<?php //pr($row);
if ($row) {
    $media_code                         = $row->media_code;
    $media_title                        = $row->media_title;
    $media_embed_code                   = $row->media_embed_code;
    $media_description                  = $row->media_description;
    $media_publish_start_datetime       = $row->media_publish_start_datetime;
    $media_publish_end_datetime         = $row->media_publish_end_datetime;
    $media_publish_utc_datetime         = $row->media_publish_utc_datetime;
    $media_category                     = $row->media_category;
    $media_placeholder_image_txt        = $row->media_placeholder_image_txt;
    $media_author                       = $row->media_author;
    $media_permalink                    = $row->media_permalink;
    $media_created_datetime             = $row->media_created_datetime;
    $media_updated_datetime             = $row->media_updated_datetime;
    $media_is_active                    = $row->media_is_active;

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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Code</label>
                                    <input type="text" class="form-control" name="media_code" id="media_code" placeholder="Enter Media Ùnique Code" value="<?php echo $media_code ?? ''; ?>" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Embed Code</label>
                                    <input type="text" class="form-control" name="media_embed_code" id="media_embed_code" placeholder="Enter Media Embed Ùnique Code" value="<?php echo $media_embed_code ?? ''; ?>" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Description</label>
                                    <textarea class="form-control ckeditor" name="media_desc" id="media_desc" placeholder="Description" required="required"><?php echo $media_description ?? ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Publish Start Datetime</label>
                                    <input type="datetime-local" class="form-control" name="media_pub_start_time" id="media_pub_start_time" value="<?php echo $media_publish_start_datetime ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Publish End Datetime</label>
                                    <input type="datetime-local" class="form-control" name="media_pub_end_time" id="media_pub_end_time" value="<?php echo $media_publish_end_datetime ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Publish UTC Datetime</label>
                                    <input type="datetime-local" class="form-control" name="media_pub_utc_time" id="media_pub_utc_time" value="<?php echo $media_publish_utc_datetime ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Category</label>
                                    <input type="text" class="form-control" name="media_cat" id="media_cat" placeholder="Enter Media Category" value="<?php echo $media_category ?? ''; ?>" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Author</label>
                                    <input type="text" class="form-control" name="media_auth" id="media_auth" placeholder="Enter Media Author" value="<?php echo $media_author ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Permalink</label>
                                    <input type="text" class="form-control" name="media_per" id="media_per" placeholder="Enter Media Permalink" value="<?php echo $media_permalink ?? ''; ?>" >
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Thumbnail</label>
                                    <?php if (isset($media_placeholder_image_txt) && trim($media_placeholder_image_txt)!== '') {?>
                                        <span><?php echo 'PATH' . $media_placeholder_image_txt ?? 'default_placeholder_image'?></span>
                                     <?php } else {?>   
                                    <input type="file" class="form-control" name="client_logo" id="client_logo" placeholder="Add Media Thumbnail" required="required">
                                    <?php } ?>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Media Thumbnail :</label>
                                    <div class="input-group mb-2">
                                        <?php if($media_placeholder_image_txt!='') { ?>
                                        <img src="<?php echo base_url();?>/uploads/media/<?php echo $media_placeholder_image_txt; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Media Thumbnail</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="client_logo" name="client_logo" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="image">Choose file</label>
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