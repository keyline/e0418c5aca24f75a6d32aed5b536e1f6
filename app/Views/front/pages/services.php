<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/service-page-banner.jpg" class="img-fluid" alt="image">
                <!--<h1>Services</h1>-->
            </div>
        </div>
    </div>
</div>

<section class="services-details pb-4">
    <div class="container">
        <div class="services-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-title">
                        <h2 class="brandcolor uppercase">services</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h3><?=$service->title?></h3>
                    <p><?=$service->description?></p>
                    <div class="mb-5 mt-3 text-center service_fullimg"><img src="<?=base_url('uploads/testing-services//'.$service->banner_image)?>" alt="image"></div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-12 pt-3 mb-3">
                    <div class="titlepart center mb-5">
                        <h2 class="brandcolor uppercase">COMMODITIES</h2>
                    </div>
                    <div id="service-commoditites" class="owl-carousel owl-theme owl-loaded owl-drag">
                    <?php if($commodities){ $i=1; foreach($commodities as $row){?>
                         <div class="item">
                            <div class="sercommite_info">
                                <div class="serv_commi_img"><a href="<?=base_url('commodity/#v-pills-'.$row->slug)?>"><img src="<?=base_url('uploads/commodity/'.$row->commodity_icon)?>" alt="image"></a></div>
                                <div class="serv_commi_title"><h4><a href="<?=base_url('commodity/#v-pills-'.$row->slug)?>"><?=$row->name?></a></h4></div>
                             </div>
                         </div>
                    <?php $i++; } }?>
                    </div>
                </div>
 
            </div>
            <div class="row py-4">
                <div class="col-md-12 pt-3 mb-3">
                    <h3><?=$service->title2?></h3>
                    <p class="mb-2"><?=$service->description2?></p>
                </div>
 
            </div>
             <div class="row pt-5 pb-5 mb-3">
                 <div class="col-md-12">
                    <div class="titlepart center mb-5">
                        <h2 class="brandcolor uppercase">ACCREDITATIONS/ RECOGNITIONS/ MEMBERSHIPS/ STANDARDS</h2>
                        <h4 class="black pt-0">Accredited and recognized by global and country-specific standards agencies</h4>
                    </div>
                    <div id="service-accreditations" class="owl-carousel owl-theme owl-loaded owl-drag">
                        <?php if($accreditations){ $i=1; foreach($accreditations as $row){?>
                        <div class="item">
                            <img src="<?=base_url('uploads/accreditations/'.$row->accreditations_logo)?>" class="img-fluid" alt="<?=$row->accreditations_name?>">
                        </div>
                        <?php $i++; } }?>
                    </div>
                 </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="stringent-box">
                        <h3 class="pb-4">STRINGENT SYSTEMS</h3>
                        <ul>
                            <?php
                            $stringent_system = json_decode($service->stringent_system);
                            if(!empty($stringent_system)){ for($k=0;$k<count($stringent_system);$k++){
                            ?>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <?=$stringent_system[$k]?></li>
                            <?php } }?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="quality-box">
                    <h3 class="pb-4">10 Steps to Quality</h3>                        
                        <div class="row">
                            <?php
                                $color_code = json_decode($service->color_code);
                                $steps_to_quality = json_decode($service->steps_to_quality);
                                if(!empty($steps_to_quality)){ for($k=0;$k<count($steps_to_quality);$k++){
                            ?>
                            <div class="col-md-6">
                                <div class="sever_system_point">
                                    <div class="serve_nub">
                                        <h2 style="background-color: <?=$color_code[$k]?>;"><?=($k+1)?></h2>
                                    </div>
                                    <p><?=$steps_to_quality[$k]?></p>
                                </div>
                            </div>
                            <?php } }?>
                            
                        </div>
                    </div>
                </div>
        </div>

    </div>
</section>