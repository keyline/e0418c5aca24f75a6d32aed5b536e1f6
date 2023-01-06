<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
  <div class="container-fluid">
      <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/blog_banner.jpg" class="img-fluid" alt="image">
                <!--<h1>Blog</h1>-->
            </div>
      </div>
  </div>
</div>
<section class="blog-listing-page lightgrey_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-title">
                    <h2 class="brandcolor uppercase">blog</h2>
                    <p class="black">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                    <h5 class="recent-title">recent blog</h5>
                </div>
            </div>
            <?php if($blogs){ $i=1; foreach($blogs as $row){?>
                <?php
                if($i%2 == 0){
                    $className = 'offset-xl-1 col-xl-11 col-lg-12 listing-box';
                } else {
                    $className = 'col-lg-12 listing-box';
                }
                ?>
                <div class="<?=$className?>">
                    <div class="listing-total">
                        <div class="left-part">
                            <div class="img-part">
                                <img src="<?=base_url('uploads/blogs/'.$row->image)?>" class="img-fluid" alt="<?=$row->title?>">
                            </div>
                        </div>
                        <div class="right-part">
                            <div class="listing-inner">
                                <h3><?=$row->title?></h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="#" class="get-icon">By: <?=$row->post_by?></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <a href="#" class="get-icon"><?=date_format(date_create($row->created_at), "F d Y")?></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                        <a href="#" class="get-icon">No Comments</a>
                                    </li>
                                </ul>
                                <p><?=substr($row->description,0,150)?> …</p>
                                <a href="<?=base_url('blog-details/'.$row->slug)?>" class="brand_btn d-inline-block mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } }?>
            <!--<div class="offset-xl-1 col-xl-11 col-lg-12 listing-box">
                <div class="listing-total">
                    <div class="left-part">
                        <div class="img-part">
                            <img src="<?=base_url('material/front/assets/img/')?>/blog-3.jpg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="listing-inner">
                            <h3>DETERMINATION OF ORGANIC CARBON AND INORGANIC CARBON OF BIOMASS</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">By: MSK Admin</a>
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#" class="get-icon"> April 6th, 2022</a>
                                </li>
                                <li>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">No Comments</a>
                                </li>
                            </ul>
                            <p>Introduction: Total carbon in the Biomass is comprised of two fractions: combustible and carbonate carbon. Combustible carbon corresponds to total organic carbon (TOC) while carbonate carbon corresponds to total inorganic …</p>
                            <a href="blog-details.php" class="brand_btn d-inline-block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-12 listing-box">
                <div class="listing-total">
                    <div class="left-part">
                        <div class="img-part">
                            <img src="<?=base_url('material/front/assets/img/')?>/blog-4.jpg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="listing-inner">
                            <h3>PROTEIN DIGESTIBILITY CORRECTED AMINO ACID SCORE (PDCAAS)- A METHOD TO EVALUATE QUALITY OF PROTEIN</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">By: MSK Admin</a>
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">April 6th, 2022</a>
                                </li>
                                <li>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">No Comments</a>
                                </li>
                            </ul>
                            <p>Introduction: The protein digestibility-corrected amino acid score (PDCAAS) has been used to evaluate protein quality in human foods.  Previously Amino Acid Scoring (AAS) provides a way to predict how efficiently …</p>
                            <a href="blog-details.php" class="brand_btn d-inline-block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-xl-1 col-xl-11 col-lg-12 listing-box">
                <div class="listing-total">
                    <div class="left-part">
                        <div class="img-part">
                            <img src="<?=base_url('material/front/assets/img/')?>/blog-3.jpg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="listing-inner">
                            <h3>NITROGEN PROFILE IN FERTILIZER BY IR ABSORPTION SPECTROSCOPY</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">By: MSK Admin</a>
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">April 6th, 2022</a>
                                </li>
                                <li>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">No Comments</a>
                                </li>
                            </ul>
                            <p>ABSTRACT: Determination of Nitrate Nitrogen, Urea –Nitrogen and Ammoniacal Nitrogen in fertilizer samples by IR spectroscopy. The main forms of Nitrogen in fertilizer are Ammoniacal Nitrogen, Urea Nitrogen and Nitrate …</p>
                            <a href="blog-details.php" class="brand_btn d-inline-block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 listing-box">
                <div class="listing-total">
                    <div class="left-part">
                        <div class="img-part">
                            <img src="<?=base_url('material/front/assets/img/')?>/blog-4.jpg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="listing-inner">
                            <h3>EXTRACTION AND ISOLATION OF PIPERINE FROM BLACK PEPPER</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">By: MSK Admin</a>
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">April 6th, 2022</a>
                                </li>
                                <li>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">No Comments</a>
                                </li>
                            </ul>
                            <p>ABSTRACT Black pepper (Piper nigrum) is a spice vine crop which is used as a food preservative and as an essential component in traditional medicines. Piperine, a major alkaloid, is …</p>
                            <a href="blog-details.php" class="brand_btn d-inline-block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-xl-1 col-xl-11 col-lg-12 listing-box">
                <div class="listing-total">
                    <div class="left-part">
                        <div class="img-part">
                            <img src="<?=base_url('material/front/assets/img/')?>/blog-3.jpg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="listing-inner">
                            <h3>SPECTROPHOTOMETRIC DETERMINATION OF ANTHOCYANIN CONTENT IN DIFFERENT FRESH FRUITS</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">By: MSK Admin</a>
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">April 6th, 2022</a>
                                </li>
                                <li>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="#" class="get-icon">No Comments</a>
                                </li>
                            </ul>
                            <p>Abstract: Anthocyanins are a type of pigment found in fruits that offer health benefit. It belongs to a class of compound called flavonoids that have antioxidant properties. The colour change …</p>
                            <a href="blog-details.php" class="brand_btn d-inline-block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div class="row flex-cen">
            <div class="col-lg-12">
                <div class="listing-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                              <li class="page-item"><a class="page-link active" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                          </nav>
                </div>
                </div>
        </div> -->
    </div> 
</section>