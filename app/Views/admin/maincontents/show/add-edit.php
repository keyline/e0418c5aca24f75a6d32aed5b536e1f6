<?php
if($row) {
    $show_title                     = $row->show_title;
    $show_keyword                   = $row->show_keyword;
    $show_metatag                   = $row->show_metatag;
    $show_cover_image               = $row->show_cover_image;
} else {
    $show_title                     = set_value('show_title', '');
    $show_keyword                   = set_value('show_keyword', '');
    $show_metatag                   = set_value('show_metatag', '');
    $show_cover_image               = set_value('show_cover_image', '');
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
                                    <label class="form-label" for="show_title">Show Name</label>
                                    <input type="text" class="form-control" name="show_title" id="show_title" placeholder="Show Name" value="<?php echo $show_title; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="show_cover_image">Show Cover Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($show_cover_image!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/show/<?php echo $show_cover_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:200px;"  />
                                      <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Show Cover Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="show_cover_image" name="show_cover_image" accept="image/*">
                                            <label class="custom-file-label" for="banner_image">Choose file</label>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="show_title">Keyword</label>
                                    <input type="text" class="form-control" name="show_keyword" id="show_keyword" placeholder="Show Keyword" value="<?php echo $show_keyword; ?>" required="required">
                                    <small class="text-primary">Enter keyword by comma (,) separated</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="show_title">Metatags</label>
                                    <input type="text" class="form-control" name="show_metatag" id="show_metatag" placeholder="Show Metatag" value="<?php echo $show_metatag; ?>" required="required">
                                    <small class="text-primary">Enter meta tag by comma (,) separated</small>
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