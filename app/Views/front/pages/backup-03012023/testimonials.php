<!-- ********|| BANNER STARTS ||******** -->
    <div class="innerpage_banner lightgrey_bg">
        <div class="container-fluid">
            <div class="row">
                    <div class="inner_bannerimg">
                        <img src="<?=base_url('material/front/assets/img/')?>/testimonial_banner.jpg" class="img-fluid" alt="image">
                        <!--<h1>About Us</h1>-->
                    </div>
            </div>
        </div>
    </div>
<!-- ********|| Home About STARTS ||******** -->
<section class="inner-withleft-content lightgrey_bg globalinner_sec testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="left_nav-section">
                    <div class="leftnav_inner">
                        <ul>
                            <li><a href="<?=base_url('about-us')?>">About Us</a></li>
                            <li><a href="<?=base_url('hr-careers')?>">HR & Careers</a></li>
                            <li><a href="<?=base_url('video-gallery')?>">Video Gallery</a></li>
                            <li class="active"><a href="<?=base_url('testimonials')?>">Testimonials</a></li>
                            <li><a href="<?=base_url('uploads/brochure/'.$brochure->brochure_pdf)?>" target="_blank">MitraSK Brochures</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="inner-title">
                    <h2 class="brandcolor uppercase">Testimonials</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                </div>
                <?php if($testimonials){ $i=1; foreach($testimonials as $row){?>
                <div class="testimonial-inner" <?php if($i>4){?>data-aos="fade-up"<?php }?>>
                    <div class="testimonial-left">
                        <div class="testimonial-img">
                            <img src="<?=base_url('uploads/testimonials/'.$row->image)?>" class="img-fluid" alt="<?=$row->name?>">
                        </div>
                    </div>
                    <div class="testimonial-info">
                        <p><?=$row->comments?></p>
                        <h5>– <?=$row->name?></h5>
                        <p><i><?=$row->designation?>, <?=$row->company_name?>.</i></p>
                    </div>
                </div>
                <?php $i++; } }?>                
            </div>
        </div>
    </div>
</section>
