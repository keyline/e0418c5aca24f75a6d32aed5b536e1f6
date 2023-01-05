<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner ">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/contact-banner.jpg" class="img-fluid" alt="image">
                <!--<h1>Contact us</h1>-->
            </div>
        </div>
    </div>
</div>
<section class="inner-withleft-content  globalinner_sec contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="left_nav-section">
                    <div class="leftnav_inner">
                        <ul>
                            <li><a href="<?=base_url('contact-us')?>">Address</a></li>
                            <li class="active"><a href="<?=base_url('enquiry-form')?>">Enquiry Form</a></li>
                            <li><a href="<?=base_url('feedback-form')?>">IFIA Feedback Form</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="career_contactform">
                    <?php if($session->getFlashdata('success_message')) { ?>
                        <p class="alert alert-success"><?php echo $session->getFlashdata('success_message');?></p>
                    <?php } ?>
                    <h3 class="uppercase">Enquiry Form</h3>
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Organisation" name="organisation" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="City" name="city" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Contact person" name="contact_person" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="country" required>
                                    <option value="" selected>Select Country</option>
                                    <?php if($countries){ foreach($countries as $country){?>
                                    <option value="<?=$country->name?>"><?=$country->name?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <textarea class="form-control" placeholder="Comment" name="comment" required></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <textarea class="form-control" placeholder="Specific Enquiry" name="special_enquiry"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <!-- <a href="#" class="brand_btn d-inline-block mt-1 mb-3">Submit</a> -->
                                <button type="submit" class="brand_btn d-inline-block mt-1 mb-3">Submit</button>
                                <!-- <a href="#" class="brand_btn d-inline-block mt-1 mb-3">Reset</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>