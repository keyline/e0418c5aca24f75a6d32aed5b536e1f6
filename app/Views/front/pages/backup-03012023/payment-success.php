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
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <p class="text-center">
                                <img src="<?=base_url('material/front/assets/images/check-circle.gif')?>" style="width: 100px; height: 100px;">
                            </p> -->
                            <h2 class="greenheading" style="color: green;"><?=$page_header?></h2>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <td style="font-weight:bold;">Booking No.</td>
                                        <td><?=$booking->booking_no?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Booking Date/Time</td>
                                        <td><?=date_format(date_create($booking->booking_date), "M d, Y")?> <?=date_format(date_create($booking->booking_time), "h:i A")?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Booking For</td>
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
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Payment Status</td>
                                        <td class="text-success" style="font-weight:bold;">Success</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Payment Date/Time</td>
                                        <td>
                                            <?=date_format(date_create($booking->payment_date_time), "M d, Y h:i A")?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Transaction ID</td>
                                        <td><?=$booking->txn_id?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="<?=base_url('booking')?>" class="btn btn-success green">Back To Booking List</a>
                </form>
            </div>
        </div>        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>