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
                <form id="changePasswordForm">
                    <div class="form-group">
                        <label for="regPassword">Old Password <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control requiredCheckPassword" name="old_password" id="regPassword" data-check="Old Password" autocomplete="off">
                            <div class="input-group-addon">
                              <a href="javascript:void(0);"><i class="fa fa-eye toggle-password"></i></a>
                            </div>
                          </div>
                    </div>                    
                    <div class="form-group">
                        <label for="new_password">New Password <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control requiredCheckPassword" name="new_password" id="new_password" data-check="New Password" autocomplete="off">
                            <div class="input-group-addon">
                              <a href="javascript:void(0);"><i class="fa fa-eye toggle-password3"></i></a>
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control requiredCheckPassword" name="confirm_password" id="confirm_password" data-check="Confirm Password" autocomplete="off">
                            <div class="input-group-addon">
                              <a href="javascript:void(0);"><i class="fa fa-eye toggle-password4"></i></a>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary green">Update</button>
                </form>
            </div>
        </div>        
    </div>
</div>