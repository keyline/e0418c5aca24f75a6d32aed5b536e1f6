<div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!"><?php echo $page_header; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Form Validation ] start -->
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

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Site Setting</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Payment Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SMS Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-email-tab" data-toggle="pill" href="#pills-email" role="tab" aria-controls="pills-email" aria-selected="false">Email Setting</a>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site Name</label>
                                                <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $site_setting->site_name; ?>" required="required">
                                            </div>
                                        </div>                                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="admin_email" placeholder="Email" value="<?php echo $site_setting->admin_email; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site Description</label>
                                                <textarea class="form-control" name="site_description" required="required" rows="5"><?php echo $site_setting->site_description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site Address</label>
                                                <textarea class="form-control" name="site_address" required="required"><?php echo $site_setting->site_address; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Site Phone</label>
                                                <input type="text" class="form-control" name="site_phone" placeholder="Site Phone" value="<?php echo $site_setting->site_phone; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Site Whatsapp No</label>
                                                <input type="text" class="form-control" name="whatsapp_no" placeholder="Site Whatsapp No" value="<?php echo $site_setting->whatsapp_no; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">JwPlayer Site Id</label>
                                                <input type="text" class="form-control" name="jwplayer_site_id" placeholder="JwPlayer Site Id" value="<?php echo $site_setting->jwplayer_site_id; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site State Code</label>
                                                <input type="text" class="form-control" name="site_state_code" placeholder="Site State Code" value="<?php echo $site_setting->site_state_code; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site GST No</label>
                                                <input type="text" class="form-control" name="site_gstn" placeholder="Site GST No" value="<?php echo $site_setting->site_gstn; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site PAN No</label>
                                                <input type="text" class="form-control" name="site_pan" placeholder="Site PAN No" value="<?php echo $site_setting->site_pan; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Site Establishment Year</label>
                                                <input type="number" class="form-control" name="establish_year" placeholder="Site Establishment Year" value="<?php echo $site_setting->establish_year; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link" value="<?php echo $site_setting->facebook_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Twitter Link</label>
                                                <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link" value="<?php echo $site_setting->twitter_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Linkedin Link</label>
                                                <input type="text" class="form-control" name="linkedin_link" placeholder="Linkedin Link" value="<?php echo $site_setting->linkedin_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Instagram Link</label>
                                                <input type="text" class="form-control" name="instagram_link" placeholder="Instagram Link" value="<?php echo $site_setting->instagram_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Youtube Link</label>
                                                <input type="text" class="form-control" name="youtube_link" placeholder="Youtube Link" value="<?php echo $site_setting->youtube_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Pinterest Link</label>
                                                <input type="text" class="form-control" name="pinterest_link" placeholder="PInterest Link" value="<?php echo $site_setting->pinterest_link; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php if($site_setting->site_logo!='') { ?>
                                                    <img src="<?php echo base_url();?>/uploads/<?php echo $site_setting->site_logo; ?>" alt="<?php echo $site_setting->site_name; ?>" style="height: 150px;" class="img-fluid img-thumbnail">
                                                    <br><br>
                                                <?php } ?>
                                                <label class="form-label">Site Logo</label>
                                                <div>
                                                    <input type="file" class="validation-file" name="site_logo">
                                                </div>
                                                <?php if($session->getFlashdata('msg1')) { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Error!</strong> <?php echo $session->getFlashdata('msg1');?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php if($site_setting->site_footer_logo!='') { ?>
                                                    <img src="<?php echo base_url();?>/uploads/<?php echo $site_setting->site_footer_logo; ?>" alt="<?php echo $site_setting->site_name; ?>" style="height: 150px;" class="img-fluid img-thumbnail">
                                                    <br><br>
                                                <?php } ?>
                                                <label class="form-label">Site Footer Logo</label>
                                                <div>
                                                    <input type="file" class="validation-file" name="site_footer_logo">
                                                </div>
                                                <?php if($session->getFlashdata('msg3')) { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Error!</strong> <?php echo $session->getFlashdata('msg3');?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php if($site_setting->site_favicon!='') { ?>
                                                    <img src="<?php echo base_url();?>/uploads/<?php echo $site_setting->site_favicon; ?>" alt="<?php echo $site_setting->site_name; ?>" class="img-fluid img-thumbnail">
                                                    <br><br>
                                                <?php } ?>
                                                <label class="form-label">Site Favicon</label>
                                                <div>
                                                    <input type="file" class="validation-file" name="site_favicon">
                                                </div>
                                                <?php if($session->getFlashdata('msg2')) { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Error!</strong> <?php echo $session->getFlashdata('msg2');?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <form id="validation-form123" action="<?=base_url('admin/user/paymentSetting')?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Payment Gateway Mode</label>
                                                <select class="form-control" name="payment_gateway_mode" required="required">
                                                    <option value="" selected>Select</option>
                                                    <option value="SANDBOX" <?=(($site_setting->payment_gateway_mode == 'SANDBOX')?'selected':'')?>>SANDBOX</option>
                                                    <option value="LIVE" <?=(($site_setting->payment_gateway_mode == 'LIVE')?'selected':'')?>>LIVE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Sandbox Secret Key</label>
                                                <input type="text" class="form-control" name="sandbox_secret_key" placeholder="Sandbox Secret Key" value="<?php echo $site_setting->sandbox_secret_key; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Sandbox Publishable Key</label>
                                                <input type="text" class="form-control" name="sandbox_publishable_key" placeholder="Sandbox Publishable Key" value="<?php echo $site_setting->sandbox_publishable_key; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">LIVE Secret Key</label>
                                                <input type="text" class="form-control" name="live_secret_key" placeholder="LIVE Secret Key" value="<?php echo $site_setting->live_secret_key; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">LIVE Publishable Key</label>
                                                <input type="text" class="form-control" name="live_publishable_key" placeholder="LIVE Publishable Key" value="<?php echo $site_setting->live_publishable_key; ?>" required="required">
                                            </div>
                                        </div>                                       
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <form id="validation-form123" action="<?=base_url('admin/user/smsSetting')?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Authentication Key</label>
                                                <input type="text" class="form-control" name="authentication_key" placeholder="Authentication Key" value="<?php echo $site_setting->authentication_key; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Sender ID</label>
                                                <input type="text" class="form-control" name="sender_id" placeholder="Sender ID" value="<?php echo $site_setting->sender_id; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Base URL</label>
                                                <input type="text" class="form-control" name="base_url" placeholder="Base URL" value="<?php echo $site_setting->base_url; ?>" required="required">
                                            </div>
                                        </div>                                       
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                                <form id="validation-form123" action="<?=base_url('admin/user/emailSetting')?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">From Email</label>
                                                <input type="text" class="form-control" name="from_email" placeholder="From Email" value="<?php echo $site_setting->from_email; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">From Name</label>
                                                <input type="text" class="form-control" name="from_name" placeholder="From Name" value="<?php echo $site_setting->from_name; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">SMTP Host</label>
                                                <input type="text" class="form-control" name="smtp_host" placeholder="SMTP Host" value="<?php echo $site_setting->smtp_host; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">SMTP Username</label>
                                                <input type="text" class="form-control" name="smtp_username" placeholder="SMTP Username" value="<?php echo $site_setting->smtp_username; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">SMTP Password</label>
                                                <input type="text" class="form-control" name="smtp_password" placeholder="SMTP Password" value="<?php echo $site_setting->smtp_password; ?>" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">SMTP Port</label>
                                                <input type="text" class="form-control" name="smtp_port" placeholder="SMTP Port" value="<?php echo $site_setting->smtp_port; ?>" required="required">
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
            <!-- [ Form Validation ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>