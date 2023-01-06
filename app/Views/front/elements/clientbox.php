
<section class="home_client wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4">
                <div class="client-left">
                    <h3>Our clients</h3>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div class="client-right">
                   <div id="home-client" class="commodites-all owl-carousel owl-theme owl-loaded owl-drag">
                        <?php if($clients){ $i=1; foreach($clients as $row){?>
                        <div class="item">
                            <div class="client-logo">
                                <img class="img-fluid" src="<?=base_url('uploads/client/'.$row->client_logo)?>" alt="<?=$row->client_name?>">
                            </div>
                        </div>
                        <?php $i++; } }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>