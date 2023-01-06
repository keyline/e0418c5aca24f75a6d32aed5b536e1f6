<?php //pr($applyPositions);?>
<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/hr-career-banner.jpg" class="img-fluid" alt="image">
                <!--<h1>People & Culture</h1>-->
            </div>
        </div>
    </div>
</div>

<section class="inner-withleft-content lightgrey_bg globalinner_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="left_nav-section">
                    <div class="leftnav_inner">
                        <ul>
                            <li><a href="<?=base_url('about-us')?>">About Us</a></li>
                            <li class="active"><a href="<?=base_url('hr-careers')?>">HR & Careers</a></li>
                            <li><a href="<?=base_url('video-gallery')?>">Video Gallery</a></li>
                            <li><a href="<?=base_url('testimonials')?>">Testimonials</a></li>
                            <li><a href="<?=base_url('uploads/brochure/'.$brochure->brochure_pdf)?>" target="_blank">MitraSK Brochures</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="inner-title">
                    <h2>People & Culture</h2>
                    <h5>– The Human Factor</h5>
                </div>
                <div class="innner-content">
                    <p><?=$static_page->description?></p>
                </div>
                <?php if($session->getFlashdata('success_message')) { ?>
                    <p class="alert alert-success"><?php echo $session->getFlashdata('success_message');?></p>
                <?php } ?>
                <?php if($session->getFlashdata('error_message')) { ?>
                    <p class="alert alert-danger"><?php echo $session->getFlashdata('error_message');?></p>
                <?php } ?>
                <div class="career_contactform">
                    <h3>APPLY HERE</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select class="form-control" name="current_position" required>
                                    <option value="" selected>Current Position at Present Employer</option>
                                    <?php if($applyPositions){ foreach($applyPositions as $applyPosition){?>
                                    <option value="<?=$applyPosition->name?>"><?=$applyPosition->name?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="applied_position" required>
                                    <option value="" selected>Select Position Applied For</option>
                                    <?php if($applyPositions){ foreach($applyPositions as $applyPosition){?>
                                    <option value="<?=$applyPosition->name?>"><?=$applyPosition->name?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="prefered_location1" required>
                                    <option value="" selected>Select Preferred Location 1</option>
                                    <?php if($countries){ foreach($countries as $country){?>
                                    <option value="<?=$country->name?>"><?=$country->name?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="prefered_location2" required>
                                    <option value="" selected>Select Preferred Location 2</option>
                                    <?php if($countries){ foreach($countries as $country){?>
                                    <option value="<?=$country->name?>"><?=$country->name?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="prefered_job_location" placeholder="Preferred Job Location if Any">
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="engage_msk" required>
                                    <option value="" selected>How you want to engage with MSK</option>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Permanent">Permanent</option>
                                    <option value="GIS Worker">GIS Worker</option>
                                    <option value="Project Basis">Project Basis</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="black">Gender</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male" name="gender" Value="Male" required>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline mb-3">
                                    <input type="radio" class="form-check-input" id="female" name="gender" Value="Female" required>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="dob" max="<?=date('Y-m-d')?>" placeholder="Date Of Birth" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile Phone" required>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="qualification" placeholder="Highest Qualification" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="yop" placeholder="Year Of Passing" maxlength="4" required onkeypress="return isNumber(event)">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="university" placeholder="University" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mt-2">Total Years Of Experience</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" name="total_experience1" required>
                                    <option value="" selected>Year</option>
                                    <?php for($i=0;$i<26;$i++){?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php }?>
                                    <option value="More Than 25 Years">More Than 25 Years</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" name="total_experience2" required>
                                    <option value="" selected>Month</option>
                                    <?php for($i=0;$i<12;$i++){?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="resume" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <p>(FILETYPES: .DOC,.DOCX,.PNG,.JPG,.PDF,.RTF)</p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="brand_btn d-inline-block mt-1 mb-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>