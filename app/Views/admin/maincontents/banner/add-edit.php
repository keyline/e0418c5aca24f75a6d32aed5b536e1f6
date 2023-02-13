<?php
if($row) {
    $heading                = $row->heading;
    $position               = $row->position;
    $orientation            = $row->orientation;
    $url_link               = $row->url_link;
    $advertisment_image     = $row->advertisment_image;
} else {
    $heading                = set_value('heading', '');
    $position               = set_value('position', '');
    $orientation            = set_value('orientation', '');
    $url_link               = set_value('url_link', '');
    $advertisment_image     = set_value('advertisment_image', '');
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
                                    <label class="form-label" for="small_text">Heading</label>
                                    <input type="text" class="form-control" name="heading" id="heading" placeholder="Advertisment Heading" value="<?php echo $heading; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">URL Link</label>
                                    <input type="text" class="form-control" name="url_link" id="url_link" placeholder="URL Link" value="<?php echo $url_link; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="advertisment_image">Advertisment Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($advertisment_image!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/banners/<?php echo $advertisment_image; ?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                                      <?php } ?>
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="advertisment_image" name="advertisment_image" accept=" image/jpeg, image/png" >
                                            <label class="custom-file-label" for="banner_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="partner_type">Advertisment Position</label>
                                    <select class="js-example-basic-single form-control" id="position" name="position">
                                        <option value="" selected="selected">Select Position</option>
                                        <option value="header"<?php if($position=='Header') { ?> selected="selected"<?php } ?>>HEADER</option>
                                        <option value="Right-side"<?php if($position=='Right-side') { ?> selected="selected"<?php } ?>>RIGHT-SIDE</option>
                                        <option value="body"<?php if($position=='Body') { ?> selected="selected"<?php } ?>>BODY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="partner_type">Advertisment Orientation</label>
                                    <select class="js-example-basic-single form-control" id="orientation" name="orientation">
                                        <option value="" selected="selected">Select orientation Type</option>
                                        <option value="horizontal"<?php if($orientation=='horizontal') { ?> selected="selected"<?php } ?>>HORIZONTAL</option>
                                        <option value="vertical"<?php if($orientation=='vertical') { ?> selected="selected"<?php } ?>>VERTICAL</option>
                                    </select>
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