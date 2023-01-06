<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/laboratories-banner.jpg" class="img-fluid" alt="image">
            </div>
        </div>
    </div>
</div>
<section class="inner-withleft-content lightgrey_bg globalinner_sec laboratories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="inner-title">
                    <h2><?= $laboratories->page_name ?></h2>
                </div>
                <div class="innner-content">
                    <?= $laboratories->description1 ?>
                 </div>
            </div>
         </div>
        <div class="labtor_inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="innner-content">
                        <div id="labotary">          
                            <ul class="resp-tabs-list hor_1">
                                <li> Central Laboratory</li>
                                <li>MSK Food and Environment Laboratory</li>
                            </ul>  
                            <div class="resp-tabs-container hor_1">                                                        
                                <div>
                                    <div class="labotary_infoinner"> 
                                        <?= $laboratories->central_laboratory ?>
                                    </div>
                                </div>
                                <div>
                                    <div class="labotary_infoinner">
                                        <?= $laboratories->food_environment ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
        	<div class="col-lg-12 col-12">
            	<div class="innner-content">
                    <?= $laboratories->description2 ?>
                </div>
            </div>
        </div>
</section>