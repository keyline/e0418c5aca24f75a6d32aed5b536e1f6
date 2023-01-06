<?php
if($row) {
    $sponsor_type           = $row->sponsor_type;
    $sponsor_name           = $row->sponsor_name;
    $website_link           = $row->website_link;
    $rank                   = $row->rank;
    $sponsor_logo           = $row->sponsor_logo;
} else {
    $sponsor_type           = set_value('sponsor_type', '');
    $sponsor_name           = set_value('sponsor_name', '');
    $website_link           = set_value('website_link', '');
    $rank                   = set_value('rank', '');
    $sponsor_logo           = set_value('sponsor_logo', '');
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
                                    <label class="form-label" for="partner_type">Sponsors Type</label>
                                    <select class="js-example-basic-single form-control" id="partner_type" name="sponsor_type">
                                        <option value="" selected="selected">Select Sponsors Type</option>
                                        <option value="HOST STATE"<?php if($sponsor_type=='HOST STATE') { ?> selected="selected"<?php } ?>>BOX 1</option>
                                        <option value="GOLD SPONSORS"<?php if($sponsor_type=='GOLD SPONSORS') { ?> selected="selected"<?php } ?>>BOX 2</option>
                                        <option value="SPONSORS"<?php if($sponsor_type=='SPONSORS') { ?> selected="selected"<?php } ?>>BOX 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="partner_name">Sponsors Name</label>
                                    <input type="text" class="form-control" name="sponsor_name" id="partner_name" placeholder="Sponsors Name" value="<?php echo $sponsor_name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="website_link">Company Website</label>
                                    <input type="text" class="form-control" name="website_link" id="website_link" placeholder="Company Website" value="<?php echo $website_link; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="rank">Sponsor Rank</label>
                                    <select class="form-control" name="rank" id="rank">
                                        <option value="" selected>Select Rank</option>
                                        <?php for($i=1; $i<=30; $i++) {?>
                                            <option value="<?=$i?>" <?=(($rank == $i)?'selected':'')?>><?=$i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="partner_logo">Sponsors Logo</label>
                                    <div class="input-group mb-2">
                                      <?php if($sponsor_logo!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/sponsors/<?php echo $sponsor_logo; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Sponsors Logo</span>
                                        </div>
                                        <div class="custom-file">                                            
                                            <input type="file" class="custom-file-input" id="sponsor_logo" name="sponsor_logo"  accept="image/jpeg,image/gif,image/png">
                                            <label class="custom-file-label" for="sponsor_logo">Choose file</label>
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