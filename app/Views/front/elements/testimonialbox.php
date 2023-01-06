
<section class="home_testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-down">
                <div class="testimonial-inner">
                    <h2 class="uppercase">Testimonial</h2>
                   <!-- <h4>Whats our customers are saying</h4>-->
                    <div id="home-testimonial" class="commodites-all owl-carousel owl-theme owl-loaded owl-drag">
                        <?php if($testimonials){ $i=1; foreach($testimonials as $row){?>
                        <div class="item">
                            <div class="testimonial-info">
                                <div class="testimonial-box">
                                    <div class="testimonial-quote">
                                        <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/quote.png" alt="<?=$row->name?>">
                                    </div>
                                    <h5><?=$row->comments?>....</h5>
                                </div>
                                <div class="client-inner">
                                    <div class="client-img">
                                        <img class="img-fluid" src="<?=base_url('uploads/testimonials/'.$row->image)?>" alt="<?=$row->name?>">
                                    </div>
                                    <div class="client-box">
                                        <h5><?=$row->name?></h5>
                                        <p><i><?=$row->designation?>, <?=$row->company_name?>.</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; } }?>                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up">
                <div class="testimonial-inner write-inner wow fadeInUp">
                    <h2 class="uppercase">Write to Us</h2>
                    <!--<p>Spirit gathered to two wherein were divide face under beast whose fly. Multiply created signs. Don't night life beginning form and signs saw of lesser meat, a. Herb dry he thing.</p>-->
                    <div class="write-form">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email*">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Your Message*"></textarea>
                            </div>
                            <button type="submit" class="send-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>