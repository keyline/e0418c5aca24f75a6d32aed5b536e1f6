<?php //pr($row);
if ($row) {
    $show_id                            = $row->show_id;
    $season_id                          = $row->season_id;
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
} else {
    $show_id                            = '';
    $season_id                          = '';
    $media_code                         = '';
    $media_title                        = '';
    $media_embed_code                   = '';
    $media_description                  = '';
    $media_publish_start_datetime       = '';
    $media_publish_end_datetime         = '';
    $media_publish_utc_datetime         = '';
    $media_category                     = '';
    $media_placeholder_image_txt        = '';
    $media_author                       = '';
    $media_permalink                    = '';
    $media_created_datetime             = '';
    $media_updated_datetime             = '';
    $media_is_active                    = '';
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
                        <input type="hidden" name="season_id" value="<?=$seasons[0]->id?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Is this Promotional ? </label><br>
                                    <input type="radio" id="yes" <?php if ($media_is_active==2) { ?> checked <?php } ?> name="is_promo" value="2" required="required">
                                    <label for="yes">YES</label>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="no" <?php if ($media_is_active==1) { ?> checked <?php } ?> name="is_promo" value="1">
                                    <label for="no">NO</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="show_id">Show</label>
                                    <select class="form-control" name="show_id" id="show_id" required="required">
                                        <option value="" selected>Select Show</option>
                                        <?php if($shows){ foreach($shows as $show){?>
                                        <option value="<?=$show->id?>" <?=(($show->id == $show_id)?'selected':'')?>><?=$show->show_title?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Title</label>
                                    <input type="text" class="form-control" name="media_title" id="media_title" placeholder="Enter Media Title" value="<?php echo $media_title ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Code</label>
                                    <input type="text" class="form-control" name="media_code" id="media_code" placeholder="Enter Media Ùnique Code" value="<?php echo $media_code ?? ''; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Embed Code</label>                                    
                                    <textarea class="form-control" name="media_embed_code" id="media_embed_code" placeholder="Media Embed Code" required="required" rows="5"><?php echo $media_embed_code ?? ''; ?></textarea>
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
                                    <input type="datetime-local" class="form-control" name="media_pub_end_time" id="media_pub_end_time" value="<?php echo $media_publish_end_datetime ?? ''; ?>">
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
                                    <input type="text" class="form-control" name="media_auth" id="media_auth" placeholder="Enter Media Author" value="<?php echo $media_author ?? ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Media Permalink</label>
                                    <input type="text" class="form-control" name="media_per" id="media_per" placeholder="Enter Media Permalink" value="<?php echo $media_permalink ?? ''; ?>" >
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