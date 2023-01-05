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
                            <li><a href="<?=base_url('enquiry-form')?>">Enquiry Form</a></li>
                            <li class="active"><a href="<?=base_url('feedback-form')?>">IFIA Feedback Form</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="inner-title">
                    <?php if($session->getFlashdata('success_message')) { ?>
                        <p class="alert alert-success"><?php echo $session->getFlashdata('success_message');?></p>
                    <?php } ?>
                    <h2>IFIA Feedback Form</h2>
                    <!-- <h5>– Contacts And Locations</h5> -->
                </div>
                <div class="innner-content">
                    <p class="font16">To <br>
                        The Compliance Officer<br>
                        MSK Compliance Programme<br>
                        Mitra S.K. Pvt Ltd<br>
                        74B, AJC Bose Road<br>
                        Kolkata – 700016<br>
                        Contact: 91- 033 – 4014 3000 / 4014 3070</p>

                    <p class="font16">Dear Sir/Madam,<br>
                        I/We would like to forward the complaint as illustrated below for your information and investigation, if any</p>
                </div>

                <div class="career_contactform">
                    <h3>APPLY HERE</h3>

                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Organisation" name="organisation" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Phone No" name="phone" required>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" placeholder="Description of the Comment" name="comment" required></textarea>
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