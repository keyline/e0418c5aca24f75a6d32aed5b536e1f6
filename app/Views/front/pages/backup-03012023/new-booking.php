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
            <div class="col-md-9 package_section">
                <h2 class="greenheading"><?=$page_header?></h2>
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group package_top">
                                <h3>Select Package</h3>
                                    <div class="package_planing">
                                        <?php if($plans){ foreach($plans as $plan){?>
                                            <span style="margin-right: 20px;">
                                                <input class="single-checkbox" type="checkbox" name="plan_id[]" id="plan<?=$plan->id?>" value="<?=$plan->id?>" onclick="setPlan(this.value)">
                                                <label for="plan<?=$plan->id?>"><?=$plan->package_name?> (INR <?=$plan->package_price?>)</label>
                                            </span>                            
                                        <?php } }?>
                                        <!-- <h4 style="font-weight:bold; color:red;">* Day 3 & All day delegate package includes INFOCOM Hackstars registration</h4><br> -->
                                        
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-success add_button" title="Add Delegate"><i class="fa fa-plus"></i> Add Delegate</a>
                            </div>                        
                        </div>
                        <div class="col-md-12">
                            <div class="field_wrapper">
                                <div class="row" style="border: 1px solid #009b3d;padding: 10px;margin-bottom: 10px;border-radius: 7px;">
                                    <!-- <p class="text-info" style="font-weight:600;">Person 1</p> -->
                                    <div class="col-md-4 mb-3">
                                        <label>Name</label>
                                        <input type="text" name="booking_name[]" class="form-control" autocomplete="off" value="<?=(($user)?$user->name.' '.$user->lname:'')?>" required/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Email</label>
                                        <input type="text" name="booking_email[]" class="form-control" autocomplete="off" value="<?=(($user)?$user->email:'')?>" required/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="booking_phone[]" class="form-control" autocomplete="off" maxlength="10" minlength="10" onkeypress="return isNumber(event)" value="<?=(($user)?$user->mobile:'')?>"  autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Company Name</label>
                                        <input type="text" name="booking_company[]" class="form-control" autocomplete="off" value="<?=(($user)?$user->company_name:'')?>" required/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="booking_designation[]" class="form-control" autocomplete="off" value="<?=(($user)?$user->designation:'')?>" required/>
                                    </div>
                                    <!-- <div class="col-md-2 mb-3" style="margin-top: 33px;">
                                        <a href="javascript:void(0);" class="btn btn-success add_button" title="Add Delegate"><i class="fa fa-plus"></i> Add Delegate</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary green" id="submit-btn" disabled><i class="fa fa-arrow-right"></i> Proceed To Next Step</button>
                </form>
            </div>
        </div>        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row" style="border: 1px solid #009b3d;padding: 10px;margin-bottom: 10px;border-radius: 7px;">\
                        <div class="col-md-4">\
                            <label>Name</label>\
                            <input type="text" name="booking_name[]" class="form-control" autocomplete="off" required />\
                        </div>\
                        <div class="col-md-4">\
                            <label>Email</label>\
                            <input type="text" name="booking_email[]" class="form-control" autocomplete="off" required />\
                        </div>\
                        <div class="col-md-4">\
                            <label>Phone</label>\
                            <input type="text" name="booking_phone[]" class="form-control" autocomplete="off" maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off" required />\
                        </div>\
                        <div class="col-md-4">\
                            <label>Company Name</label>\
                            <input type="text" name="booking_company[]" class="form-control" autocomplete="off" required />\
                        </div>\
                        <div class="col-md-4">\
                            <label>Designation</label>\
                            <input type="text" name="booking_designation[]" class="form-control" autocomplete="off" required/>\
                        </div>\
                        <div class="col-md-2" style="margin-top: 33px;">\
                            <a href="javascript:void(0);" class="btn btn-danger remove_button" title="Remove Delegate"><i class="fa fa-minus"></i> Remove Delegate</a>\
                        </div>\
                    </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    
});

$('input[type=checkbox]').on('change', function (e) {
    // if($("#plan5").prop('checked') == true){
    //     checkLimit = 3;
    // } else {
    //     checkLimit = 2;
    // }
    // if ($('input[type=checkbox]:checked').length > checkLimit) {
    //     $('input[type=checkbox]').prop('checked', false);
    //     alert('You Can Select Maximum Two Days !!!');
    // }
    if ($('input[type=checkbox]:checked').length == 1) {
        //$('input[type=checkbox]').prop('checked', false);
        $('#submit-btn').prop('disabled', false);
        //alert('You have To Select Atleast One Day !!!');
    }
});
</script>