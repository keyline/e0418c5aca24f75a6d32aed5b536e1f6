<?php
$pageName = basename($_SERVER['PHP_SELF']);
?>
<div class="rightdash_img" style="max-width: 100%;">
    <div class="rightsection_form loginfrom_center">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked list-group user-panel" style="font-size: 18px; padding: 10px; border-radius: 5px;">
                   <li class="list-group-item user-panel-menu <?=(($pageName == 'dashboard')?'active':'')?>"><a href="<?=base_url('dashboard')?>"><i class="fa fa-home"></i> Dashboard</a></li>
                   <li class="list-group-item user-panel-menu <?=(($pageName == 'profile')?'active':'')?>"><a href="<?=base_url('profile')?>"><i class="fa fa-user"></i> Profile</a></li>
                   <li class="list-group-item user-panel-menu <?=(($pageName == 'change-password')?'active':'')?>"><a href="<?=base_url('change-password')?>"><i class="fa fa-key"></i> Change Password</a></li>
                   <li class="list-group-item user-panel-menu <?=(($pageName == 'booking')?'active':'')?>"><a href="<?=base_url('booking')?>"><i class="fa fa-list"></i> Ticket Booking</a></li>
                   <!-- <li class="list-group-item user-panel-menu <?=(($pageName == 'wishlist')?'active':'')?>"><a href="<?=base_url('wishlist')?>"><i class="fa fa-heart"></i> Wishlist</a></li> -->
                   <li class="list-group-item user-panel-menu"><a href="javascript:void(0);" class="userLogout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                </ul>
            </div>
            <?php
            $productinfo          = $user->id;
            $txnid                = time();
            $surl                 = $surl;
            $furl                 = $furl;        
            $key_id               = RAZOR_KEY_ID;
            $currency_code        = CURRENCY_CODE;            
            $total                = ($booking->grand_total* 100);
            $amount               = $booking->grand_total;
            // $total                = (1* 100);
            // $amount               = 100;
            $merchant_order_id    = $booking->id;
            $card_holder_name     = $user->name.' '.$user->lname;
            $email                = $user->email;
            $phone                = $user->mobile;
            $name                 = APPLICATION_NAME;
            $return_url           = $return_url;
            ?>
            <div class="col-md-9">
                    <h2 class="greenheading"><?=$page_header?></h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Booking Package</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Company Name</th>
                                            <th>Designation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $planName = [];
                                        $booking_day = json_decode($booking->booking_day);
                                        if(!empty($booking_day)){ for($p=0;$p<count($booking_day);$p++){
                                            $plan = $common_model->find_data('package_plans', 'row', ['id' => $booking_day[$p]]);
                                            if($plan){
                                                $planName[] = $plan->package_name;
                                            }
                                        } }
                                        $booking_name = json_decode($booking->booking_name);
                                        $booking_email = json_decode($booking->booking_email);
                                        $booking_phone = json_decode($booking->booking_phone);
                                        $booking_company = json_decode($booking->booking_company);
                                        $booking_designation = json_decode($booking->booking_designation);
                                        if(!empty($booking_name)){ for($i=0;$i<count($booking_name);$i++){
                                        ?>
                                        <tr>
                                            <td><?=($i+1)?></td>
                                            <td><?=implode(", ", $planName)?></td>
                                            <td><?=$booking_name[$i]?></td>
                                            <td><?=$booking_email[$i]?></td>
                                            <td><?=$booking_phone[$i]?></td>
                                            <td><?=$booking_company[$i]?></td>
                                            <td><?=$booking_designation[$i]?></td>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" style="text-align: right;">Subtotal</th>
                                            <th><i class="fa fa-inr"></i> <?=$booking->booking_amount?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" style="text-align: right;">Discount</th>
                                            <th><i class="fa fa-inr"></i> <?=$booking->discount_amount?> (<?=$booking->discount_percent?> %)</th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" style="text-align: right;">GST</th>
                                            <th><i class="fa fa-inr"></i> <?=$booking->gst_amount?> (<?=$booking->gst_percent?> %)</th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" style="text-align: right;">Payable Amount</th>
                                            <th><i class="fa fa-inr"></i> <?=$booking->grand_total?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo (int)$total; ?>"/>
                        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo (int)$amount; ?>"/>
                    </form>
                        <input id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="&#8377; PAY NOW" class="btn btn-success" /> -->
                    <!-- <button type="submit" class="btn btn-primary green"><i class="fa fa-arrow-right"></i> PAY NOW</button> -->
                    <a href="https://infocompay.abp.in/payment-page.php?bookingId=<?=encoded($booking->id)?>" class="btn btn-success green"><i class="fa fa-arrow-right"></i> PAY NOW</a>
                <!-- </form> -->
            </div>
        </div>        
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: "<?php echo $total; ?>",
    name: "<?php echo $name; ?>",
    description: "<?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
            location.reload()
        }
    }
  };
  var razorpay_submit_btn, razorpay_instance;

  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>