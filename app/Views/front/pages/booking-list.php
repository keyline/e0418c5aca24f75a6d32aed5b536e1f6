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
            <div class="col-md-9">
                <h2 class="greenheading"><?=$page_header?></h2>
                <!-- <h3><a href="<?=base_url('new-booking')?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> New Booking</a></h3> -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Booking No. / <br>Payment Details</th>
                                <th>Booking Date/Time</th>
                                <th>Booking Details</th>
                                <th>Booking Day</th>
                                <!-- <th>Payment Details</th> -->
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($bookings){ $sl=1; foreach($bookings as $booking){
                                $planName = [];
                                $booking_day = json_decode($booking->booking_day);
                                if(!empty($booking_day)){ for($p=0;$p<count($booking_day);$p++){
                                    $plan = $common_model->find_data('package_plans', 'row', ['id' => $booking_day[$p]]);
                                    if($plan){
                                        $planName[] = $plan->package_name;
                                    }
                                } }
                            ?>
                            <tr>
                                <td><?=$sl++?>
                                </td>
                                <td><strong><?=$booking->booking_no?></strong>

                                    <p><strong>Booking Amount:</strong> <?=$booking->booking_amount?></p>
                                    <p><strong>Discount Amount:</strong> <?=$booking->discount_amount?></p>
                                    <p><strong>Payable Amount:</strong> <?=$booking->grand_total?></p>
                                    <?php if($booking->payment_status) {?>
                                        <p><strong>Payment Status:</strong> <span class="text-success" style="font-weight:bold;">PAID</span></p>
                                        <p><strong>Payment Mode:</strong> <?=$booking->payment_mode?></p>
                                        <p><strong>Txn ID:</strong> <?=$booking->txn_id?></p>
                                        <p><strong>Payment Date/Time:</strong> <?=date_format(date_create($booking->payment_date_time), "M d, Y h:i A")?></p>
                                    <?php } else {?>
                                        <a href="<?=base_url('checkout/'.encoded($booking->id))?>" class="btn btn-info btn-sm"><i class="fa fa-inr"></i> Retry Payment</a>
                                    <?php }?>
                                </td>
                                <td><?=date_format(date_create($booking->booking_date), "M d, Y")?> <?=date_format(date_create($booking->booking_time), "h:i A")?></td>
                                <td>
                                    <ul class="list-group">
                                        <?php
                                        $booking_name = json_decode($booking->booking_name);
                                        $booking_email = json_decode($booking->booking_email);
                                        $booking_phone = json_decode($booking->booking_phone);
                                        $booking_company = json_decode($booking->booking_company);
                                        $booking_designation = json_decode($booking->booking_designation);
                                        if(!empty($booking_name)){ for($i=0;$i<count($booking_name);$i++){
                                        ?>
                                        <li class="list-group-item"><?=$booking_name[$i]?> || <?=$booking_email[$i]?> ||<br> <?=$booking_phone[$i]?> || <?=$booking_company[$i]?>  ||<br> <?=$booking_designation[$i]?></li>
                                        <?php } }?>
                                    </ul>
                                </td>
                                <td><?=implode(", ", $planName)?></td>
                                <!-- <td>
                                    <p><strong>Booking Amount:</strong> <?=$booking->booking_amount?></p>
                                    <p><strong>Discount Amount:</strong> <?=$booking->discount_amount?></p>
                                    <p><strong>Payable Amount:</strong> <?=$booking->grand_total?></p>
                                    <?php if($booking->payment_status) {?>
                                        <p><strong>Payment Status:</strong> <span class="text-success" style="font-weight:bold;">PAID</span></p>
                                        <p><strong>Payment Mode:</strong> <?=$booking->payment_mode?></p>
                                        <p><strong>Txn ID:</strong> <?=$booking->txn_id?></p>
                                        <p><strong>Payment Date/Time:</strong> <?=date_format(date_create($booking->payment_date_time), "M d, Y h:i A")?></p>
                                    <?php } else {?>
                                        <a href="<?=base_url('checkout/'.encoded($booking->id))?>" class="btn btn-info btn-sm"><i class="fa fa-inr"></i> Retry Payment</a>
                                    <?php }?>
                                </td> -->
                                <!-- <td>
                                   <a target="_blank" href="<?=base_url('new-booking')?>" class="btn btn-info"><i class="fa fa-print"></i> New Booking</a> 
                                </td> -->
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>