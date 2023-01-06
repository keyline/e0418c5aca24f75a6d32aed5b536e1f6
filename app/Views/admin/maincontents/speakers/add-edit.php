<?php
if($row) {
    $name                       = $row->name;
    $designation                = $row->designation;
    $company_name               = $row->company_name;
    $image                      = $row->image;
    $rank                       = $row->rank;
} else {
    $name                       = set_value('name', '');
    $designation                = set_value('designation', '');
    $company_name               = set_value('company_name', '');
    $image                      = set_value('image', '');
    $rank                       = set_value('rank', '');
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
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="<?php echo $designation; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="rank">Rank</label>
                                    <select class="form-control" name="rank" id="rank" required="required">
                                        <option value="" selected>Select Rank</option>
                                        <?php for($i=1; $i<=100; $i++) {?>
                                            <option value="<?=$i?>" <?=(($rank == $i)?'selected':'')?>><?=$i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($image!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/speakers/<?php echo $image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;border-radius: 50%;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">
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