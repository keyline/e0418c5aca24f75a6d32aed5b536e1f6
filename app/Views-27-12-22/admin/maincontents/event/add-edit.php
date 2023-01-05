<?php
if($row) {
    $category_id                = $row->category_id;
    $title                      = $row->title;
    $event_date                 = $row->event_date;
    $event_venue                = $row->event_venue;
    $event_theme                = $row->event_theme;
    $overview_description       = $row->overview_description;
    $conference_desscription    = $row->conference_desscription;
    $event_banner               = $row->event_banner;
} else {
    $category_id                = set_value('category_id', '');
    $title                      = set_value('title', '');
    $event_date                 = set_value('event_date', '');
    $event_venue                = set_value('event_venue', '');
    $event_theme                = set_value('event_theme', '');
    $overview_description       = set_value('overview_description', '');
    $conference_desscription    = set_value('conference_desscription', '');
    $event_banner               = set_value('event_banner', '');
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
                            <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5>
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
                                        <label class="form-label" for="category_id">Event Category</label>
                                        <select class="js-example-basic-single form-control" id="category_id" name="category_id" required="required">
                                            <option value="" selected="selected">Select Event Category</option>
                                             <?php
                                             if($cats){ $i=1; foreach ($cats as $row) {?>
                                            <option value="<?=$row->id; ?>"<?php if($category_id==$row->id) { ?> selected="selected"<?php } ?>><?=$row->name;?></option>
                                            <?php  }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Event Name</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Event Name" value="<?php echo $title; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="event_date">Event Date</label>
                                        <input type="text" class="form-control" name="event_date" id="event_date" placeholder="Event Date" value="<?php echo $event_date; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="event_venue">Event Venue</label>
                                        <input type="text" class="form-control" name="event_venue" id="event_venue" placeholder="Event Venue" value="<?php echo $event_venue; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="event_theme">Event Theme</label>
                                        <input type="text" class="form-control" name="event_theme" id="event_theme" placeholder="Event Theme" value="<?php echo $event_theme; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="overview_description">Overview Description</label>
                                        <textarea class="form-control ckeditor" name="overview_description" id="overview_description" placeholder="Overview Description" required="required"><?php echo $overview_description; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="conference_desscription">Conference Description</label>
                                        <textarea class="form-control ckeditor" name="conference_desscription" id="conference_desscription" placeholder="Conference Description" required="required"><?php echo $conference_desscription; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="event_banner">Event Banner</label>
                                        <div class="input-group mb-2">
                                          <?php if($event_banner!='') { ?>
                                          <img src="<?php echo base_url();?>/uploads/events/<?php echo $event_banner; ?>" class="img-responsive img-thumbnail" style="height:100px; width:300px;"  />
                                          <?php } ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Event Banner</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="event_banner" name="event_banner" <?php if($action == 'Add'){?>required<?php }?>>
                                                <label class="custom-file-label" for="event_banner">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="event_banner">Event Images</label>
                                        
                                        <div class="row">
                                            <?php if(!empty($eventImages)) { foreach($eventImages as $eventImage){?>
                                            <div class="col-md-2 mb-3">
                                                <img src="<?php echo base_url();?>/uploads/events/<?php echo $eventImage->event_image; ?>" class="img-responsive img-thumbnail" style="height:150px; width:100%;" />
                                                <a href="<?=base_url('admin/manage_event/delete_single_image/'.$eventImage->id.'/'.$eventImage->event_id)?>" class="btn btn-danger btn-block" onclick="return confirm('Are you sure ?');">Delete</a>
                                            </div>
                                            <?php } }?>
                                        </div>
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Event Images</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="event_images" name="event_images[]" multiple <?php if($action == 'Add'){?>required<?php }?>>
                                                <label class="custom-file-label" for="event_images">Choose file</label>
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