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
                <div class="row">
                    <div class="col-md-12">
                        <!-- <p class="text-center">
                            <img src="<?=base_url('material/front/assets/images/failed.gif')?>" style="width: 120px; height: 100px;">
                        </p> -->
                        <h2 class="greenheading"><?=$page_header?></h2>
                        <table class="table table-striped">
                            <tr>
                                <td style="font-weight:bold; text-align:center">PAYMENT FAILED !!!</td>
                            </tr>
                             <tr>
                                <td style="font-weight:bold; text-align:center">
                                    <a href="<?=base_url('payment-failure'.encoded($booking->id))?>" class="btn btn-danger green" style="text-align: center;">Retry Payment</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold; text-align:center">
                                    <a href="<?=base_url('booking')?>" class="btn btn-danger green" style="text-align: center;">Back To Booking List</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>                
            </div>
        </div>        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>