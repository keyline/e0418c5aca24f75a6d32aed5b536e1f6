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
                <form id="updateProfileForm">
                    <div class="form-group">
                        <label for="name">First Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="text" class="form-control requiredCheckProfile" name="name" id="name" data-check="First Name" placeholder="Enter First Name" autocomplete="off" value="<?=(($user)?$user->name:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="text" class="form-control requiredCheckProfile" name="lname" id="lname" data-check="Last Name" placeholder="Enter Last Name" autocomplete="off" value="<?=(($user)?$user->lname:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="text" class="form-control requiredCheckProfile" name="company_name" id="company_name" data-check="Company Name" placeholder="Enter Company name" autocomplete="off" value="<?=(($user)?$user->company_name:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="text" class="form-control requiredCheckProfile" name="designation" id="designation" data-check="Designation" placeholder="Enter Designation" autocomplete="off" value="<?=(($user)?$user->designation:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Email Id <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="email" class="form-control requiredCheckProfile" name="emailAddress" id="emailAddress" data-check="Email" placeholder="Enter email address" autocomplete="off" readonly value="<?=(($user)?$user->email:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile No. <span class="red" style="color:red; font-weight: bold;">*</span></label>
                        <input type="tel" class="form-control requiredCheckProfile" name="mobile" id="mobile" data-check="Mobile Number" placeholder="Enter Mobile no." maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off" value="<?=(($user)?$user->mobile:'')?>">
                    </div>
                    <div class="form-group">
                        <label for="">Office No. </label>
                        <input type="tel" class="form-control" name="office_no" data-check="Office Number" placeholder="Enter Office no." maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off" value="<?=(($user)?$user->office_no:'')?>">
                    </div>
                    <button type="submit" class="btn btn-primary green">Update</button>
                </form>
            </div>
        </div>        
    </div>
</div>